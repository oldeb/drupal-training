<?php

$databases['default']['default'] = array(
  'database' => 'db',
  'username' => 'db',
  'password' => 'db',
  'prefix' => 'form_',
  'host' => 'db',
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'driver' => 'mysql',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);

$settings['trusted_host_patterns'] = ['formation-drupal\.ddev\.site'];
