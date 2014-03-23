<?php
use Silex\Provider\DoctrineServiceProvider;
$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbhost' => 'localhost',
        'dbname' => 'testsilex',
        'user' => 'root',
        'password' => '',
    ),
));

$app['twig.path'] = array(__DIR__.'/../../src/view');
$app['twig.options'] = array('cache' => __DIR__.'/../cache/twig');
?>
