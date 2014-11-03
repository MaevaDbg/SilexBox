<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Form\EmailSubscriptionType;
use Form\ArticleType;
use Entity\Article;


/*================================
=            HOMEPAGE            =
================================*/
$app->get('/{_locale}', function () use ($app) {

    $article = new Article();
    $article->setTitle("Mon titre");
    $article->setExcerpt("Résumé");
    $article->setDescription("Ma description");

    $em = $app['orm.em'];

    $em->persist($article);
    $em->flush();

    $articles = $em->getRepository("Entity\Article")->findAll();

    return $app['twig']->render('index.html.twig', array("articles" => $articles));
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


/*=============================
=            ADMIN            =
=============================*/

//ADD ARTICLE
$app->match('/admin/add-article', function (Request $request) use ($app) {

    $form = $app['form.factory']->create(new ArticleType($app));
    $form->handleRequest($request);
    if ($form->isValid()) {
        $data = $form->getData();
        return $app['twig']->render('admin/article-add.html.twig', array('data' => $data));
    }

    return $app['twig']->render('admin/article-add.html.twig', array('form' => $form->createView()));
    
})
->bind('add-article');

//UPDATE ARTICLE
$app->get('/admin/update-article', function (Request $request) use ($app) {
})
->bind('update-article');

//DELETE ARTICLE
$app->get('/admin/delete-article', function (Request $request) use ($app) {
})
->bind('delete-article');

/*-----  End of ADMIN  ------*/




/*==============================
=            ERREUR            =
==============================*/
$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }
    return $app['twig']->render('404.html.twig');
});

?>
