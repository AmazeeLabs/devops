<?php
/**
 * @file
 * AmazeeIO Drupal 7 all environment configuration file.
 *
 * This file should contain all settings.php configurations that are needed by all environments.
 */

// Uncomment to use Varnish.
# $conf['cache_backends'][] = 'sites/all/modules/varnish/varnish.cache.inc';
# $conf['cache_class_cache_page'] = 'VarnishCache';

// Uncomment to use Redis.
# $conf['redis_client_interface'] = 'Predis';
# $conf['cache_backends'][] = 'sites/all/modules/redis/redis.autoload.inc';
# $conf['cache_default_class'] = 'Redis_Cache';
# $conf['cache_prefix'] = getenv('AMAZEEIO_SITENAME') . '_';

// Uncomment to use Domains Module
include DRUPAL_ROOT . '/sites/all/modules/domain/settings.inc';
