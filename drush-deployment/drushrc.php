<?php
$options['package-handler'] = 'git_drupalorg';
$options['gitsubmodule'] = TRUE;
$command_specific['sql-sync'] = array('no-cache' => TRUE, 'create-db' => TRUE, 'no-ordered-dump' => TRUE);
$command_specific['rsync'] = array('verbose' => TRUE);
