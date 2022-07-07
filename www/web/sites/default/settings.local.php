<?php

$databases['default']['default'] = [
  'database' => 'drupal9',
  'username' => 'drupal9',
  'password' => 'drupal9',
  'prefix' => '',
  'host' => 'database',
  'port' => '3306',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'driver' => 'mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
];
$settings['config_sync_directory'] = '../config/sync';
$config['system.logging']['error_level'] = 'verbose';
$config['config_split.config_split.dev']['status'] = TRUE;
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';
