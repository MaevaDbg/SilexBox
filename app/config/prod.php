<?php
/**
 * CONFIG PROD ENV
 */
use Silex\Provider\DoctrineServiceProvider;

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
?>
