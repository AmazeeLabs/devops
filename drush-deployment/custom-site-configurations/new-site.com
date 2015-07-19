{
  "dev": {
      "remote-host": "dev1.compact.amazee.io",
      "remote-environment": "amazee.io",
      "remote-user": "new-site_com_dev",
      "path-aliases": {
          "%drush-script": "/usr/local/bin/drush",
          "%dump-dir": "/var/www/new-site_com_dev/"
      },
      "root": "/var/www/new-site_com_dev/public_html",
      "uri": "http://$siteurl.dev.dev1.compact.amazee.io",
      "deploy-via": "Pull",
      "branch": "dev",
      "after": {
        "deploy-update-code": [
          "deploy_gulp_compile_task",
          "deploy_cache_css_js_task"
        ]
      }
  }
}
