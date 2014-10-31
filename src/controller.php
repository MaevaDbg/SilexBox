<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Form\EmailSubscriptionType;


/*================================
=            HOMEPAGE            =
================================*/
$app->get('/{_locale}', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->assert('_locale', 'fr|en')
->value('_locale', 'fr')
->bind('homepage');
/*-----  End of homepage  ------*/


/*==========================================
=            EMAIL SUBSCRIPTION            =
==========================================*/
$app->match('/email-subscription', function (Request $request) use ($app) {

    $form = $app['form.factory']->create(new EmailSubscriptionType($app));

    $form->handleRequest($request);
    if ($form->isValid()) {
        $data = $form->getData();
        return $app['twig']->render('email-subscription.html.twig', array('data' => $data));
    }

    return $app['twig']->render('email-subscription.html.twig', array('form' => $form->createView()));

})
->bind('email-subscription');
/*-----  End of email subscription  ------*/


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
