<?php
use Symfony\Component\HttpFoundation\Response;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage');

$app->get('/hello/{name}', function ($name) use ($app) {
    $post = $app['db']->fetchAll('SELECT * FROM articles');
    var_dump($post);
    return 'Hello '.$app->escape($name);
});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    /*$templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );
    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);*/
    return new Response('Erreur');
});
?>
