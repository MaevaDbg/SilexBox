<?php
/**
 * CONFIG DEV ENV
 */
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

//include prod config
require __DIR__.'/prod.php';

//enable debug mode
$app['debug'] = true;

//Config BDD access for Doctrine
$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbhost' => 'localhost',
        'dbname' => 'testsilex',
        'user' => 'root',
        'password' => '',
    ),
));

//enable symfony web debug toolbar
$app->register(new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
    'profiler.mount_prefix' => '/_profiler', // this is the default
));
?>
