#!/bin/bash
# Add Vagrant's NFS setup commands to sudoers, for `vagrant up` without a password
# Updated to work with Vagrant 1.3.x

# Stage updated sudoers in a temporary file for syntax checking
TMP=$(mktemp -t vagrant_sudoers)
cat /etc/sudoers > $TMP
cat >> $TMP <<EOF
# Allow NFS Operations without password prompt
Cmnd_Alias VAGRANT_EXPORTS_ADD = /usr/bin/tee -a /etc/exports
Cmnd_Alias VAGRANT_NFSD = /sbin/nfsd restart
Cmnd_Alias VAGRANT_EXPORTS_REMOVE = /usr/bin/sed -E -e /*/ d -ibak /etc/exports
%admin ALL=(root) NOPASSWD: VAGRANT_EXPORTS_ADD, VAGRANT_NFSD, VAGRANT_EXPORTS_REMOVE

# Allow passwordless startup of Vagrant with vagrant-hostsupdater.
Cmnd_Alias VAGRANT_HOSTS_ADD = /bin/sh -c echo "*" >> /etc/hosts
Cmnd_Alias VAGRANT_HOSTS_REMOVE = /usr/bin/sed -i -e /*/ d /etc/hosts
%admin ALL=(root) NOPASSWD: VAGRANT_HOSTS_ADD, VAGRANT_HOSTS_REMOVE
EOF

# Check syntax and overwrite sudoers if clean
visudo -c -f $TMP
if [ $? -eq 0 ]; then
  echo "Adding vagrant commands to sudoers"
  cat $TMP > /etc/sudoers
else
  echo "sudoers syntax wasn't valid. Aborting!"
fi

rm -f $TMP
