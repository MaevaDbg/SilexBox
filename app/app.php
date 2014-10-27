<?php
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Symfony\Component\HttpFoundation\Response;
use Silex\Provider\MonologServiceProvider;

$app = new Application();

$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new UrlGeneratorServiceProvider());
$app->register(new SessionServiceProvider());

$app['twig.path'] = array(__DIR__.'/../../src/view');
$app['twig.options'] = array('cache' => __DIR__.'/../cache/twig');

//enable log for requests and errors
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../logs/silex_dev.log',
));

return $app;
?>
