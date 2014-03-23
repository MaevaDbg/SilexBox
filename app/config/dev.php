<?php
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

require __DIR__.'/prod.php';

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbhost' => 'localhost',
        'dbname' => 'testsilex',
        'user' => 'root',
        'password' => '',
    ),
));

$app['debug'] = true;

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../logs/silex_dev.log',
));

$app->register(new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
    'profiler.mount_prefix' => '/_profiler', // this is the default
));
?>
