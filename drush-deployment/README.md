aliases.drushrc.php.dist
========================

In favor of being able to deploy with drush deploy in future we had to make some changes to our existing aliases file.

Our infrastructure is documented (as in documented in code) in the servers.json file and provides the data for the alias file.

In the aliases file we just need to modify the sitename variable to match the username we deploy on our servers (the rest is generated automagically)

## Additional Development Enviroments
If there's need for additional environments we can create a json file within the customers folder. This file would be also consumed by the aliases file and provides additional environments bound to a alias.

To be loaded within the right environment the name of the json has to match the name of the sitename provided in aliases.drushrc.php


The structure within the additional json files is provided below:

      {
      "aliasname": {
        "remote-host": "localho.st",
        "remote-user": "username",
        "path-aliases": {
          "%drush-script": "/home/localho_st/bin/drush",
          "%dump-dir": "/home/localho_st/"
        },
        "command-specific": {
          "sql-sync": {
            "no-cache": true,
            "no-ordered-dump": true
          }
        },
        "root": "/home/localho_st/public_html",
        "uri": "http://localho.st/"
      }
    }
