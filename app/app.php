<?php
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\MonologServiceProvider;

$app = new Application();

$app->register(new ServiceControllerServiceProvider());
$app->register(new UrlGeneratorServiceProvider());
$app->register(new SessionServiceProvider());

//add Twig template engine
$app->register(new TwigServiceProvider());
$app['twig.path'] = array(__DIR__.'/../src/view'); //template dir
$app['twig.options'] = array('cache' => __DIR__.'/cache/twig'); //cache dir
//add extensions for Twig
$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    //add filter for localization of DateTime objects
    $twig->addExtension(new Twig_Extensions_Extension_Intl($app));
    return $twig;
}));

//add log for requests and errors
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/logs/silex.log',
));

return $app;
?>
