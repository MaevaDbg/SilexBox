<?php
/**
 * CONFIG APP DEPENDENCIES
 */
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

$app = new Application();

$app->register(new ServiceControllerServiceProvider());
$app->register(new UrlGeneratorServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new ValidatorServiceProvider());


/*====================================
=            DOCTRINE ORM            =
====================================*/
$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" =>  __DIR__."/cache/doctrine/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type"      => "annotation",
                "namespace" => "Entity",
                "path"      => __DIR__."/../src/Entity",
            ),
        ),
    ),
));



/*============================
=            TWIG            =
============================*/
//add Twig template engine
$app->register(new TwigServiceProvider());
$app['twig.path'] = array(__DIR__.'/../src/View'); //template dir
$app['twig.options'] = array('cache' => __DIR__.'/cache/twig'); //cache dir
//add extensions for Twig
$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    //add filter for localization of DateTime objects
    $twig->addExtension(new Twig_Extensions_Extension_Intl($app));
    return $twig;
}));


/*===================================
=            TRANSLATION            =
===================================*/
//add translation service
$app->register(new TranslationServiceProvider(), array(
    //default lang
    'locale_fallback' => array('fr'),
));
//define YAML-based language files
$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());
 
    // Ajout des fichiers de ressources de langue
    $translator->addResource('yaml', __DIR__.'/../src/Locales/en.yml', 'en');
    $translator->addResource('yaml', __DIR__.'/../src/Locales/fr.yml', 'fr');
 
    return $translator;
}));


/*===============================
=            SESSION            =
===============================*/
//add Session Service
$app->register(new SessionServiceProvider());
$app['session']->start();


/*=================================
=            ERROR LOG            =
=================================*/
//add log for requests and errors
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/logs/silex.log',
));

return $app;
?>
