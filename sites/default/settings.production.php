<?php
/**
 * @file
 * AmazeeIO Drupal 7 production environment configuration file.
 *
 * This file will only be included on production environemnts.
 */

### Requirement: Define the $base_url (no trailing slash!)
$base_url = "http://example.com";

# $conf['preprocess_css'] = TRUE;
# $conf['preprocess_js'] = TRUE;

# $conf['cache'] = 1;
# $conf['cache_lifetime'] = 0;
# $conf['page_cache_maximum_age'] = 3600; // 1 hour

// Uncomment to use Varnish.
# $conf['cache_backends'][] = 'sites/all/modules/varnish/varnish.cache.inc';
# $conf['cache_class_cache_page'] = 'VarnishCache';
