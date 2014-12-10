<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Form\EmailSubscriptionType;
use Form\ArticleType;
use Entity\Article;
use Repository\ArticleRepository;


/*================================
=            HOMEPAGE            =
================================*/
$app->get('/{_locale}', function () use ($app) {

    $lang = $app['request']->getLocale();

    if($app['debug']){
        $env = 'dev';
    }else{
        $env = 'prod';
    }

    $repo = new ArticleRepository ($app);
    $articles = $repo->findPushedArticle($lang, $env);

    return $app['twig']->render('index.html.twig', array( 'articles' => $articles ));
})
->assert('_locale', 'fr|en')
->value('_locale', 'fr')
->bind('homepage');
/*-----  End of homepage  ------*/



/*============================
=            BLOG            =
============================*/
$app->get('/{_locale}/blog', function (Request $request) use ($app) {

    $lang = $app['request']->getLocale();

    if($app['debug']){
        $env = 'dev';
    }else{
        $env = 'prod';
    }

    $repo = new ArticleRepository ($app);
    $articles = $repo->findAllArticle($lang, $env);

    return $app['twig']->render('blog.html.twig', array( 'articles' => $articles ));
})
->assert('_locale', 'fr|en')
->value('_locale', 'fr')
->bind('blog');
/*-----  End of blog  ------*/



/*===============================
=            ARTICLE            =
===============================*/
$app->get('/{_locale}/blog/{slug}', function (Request $request, $slug) use ($app) {

    if($app['debug']){
        $env = 'dev';
    }else{
        $env = 'prod';
    }

    $repo = new ArticleRepository ($app);
    $article = $repo->findBySlug($slug, $env);

    return $app['twig']->render('blog-article.html.twig', array( 'article' => $article ));

})
->assert('_locale', 'fr|en')
->value('_locale', 'fr')
->bind('article');
/*-----  End of ARTICLE  ------*/



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



/*==================================
=            ADMIN HOME            =
==================================*/
$app->get('/admin', function (Request $request) use ($app) {

    $em = $app['orm.em'];
    $articles = $em->getRepository("Entity\Article")->findAll();

    return $app['twig']->render('admin/index.html.twig', array('articles' => $articles));

})
->bind('admin');
/*-----  End of admin home  ------*/



/*===========================================
=            ADMIN - ADD ARTICLE            =
===========================================*/
$app->match('/admin/add-article', function (Request $request) use ($app) {

    $form = $app['form.factory']->create(new ArticleType($app));
    $form->handleRequest($request);

    if ($form->isValid()) {
        $article = $form->getData();
        $em = $app['orm.em'];

        $em->persist($article);
        $em->flush();
        $app['session']->getFlashBag()->add('article', 'Votre article a bien été ajouté');
        
        return $app->redirect($app["url_generator"]->generate("admin"));
    }

    return $app['twig']->render('admin/article-form.html.twig', array('form' => $form->createView(), 'titre' => 'Ajouter un article'));
    
})
->bind('add-article');
/*-----  End of admin add article  ------*/



/*===========================================
=            ADMIN - DUPLICATE ARTICLE            =
===========================================*/
$app->match('/admin/duplicate-article/{id}', function ($id, Request $request) use ($app) {

    $em = $app['orm.em'];
    $article = $em->getRepository("Entity\Article")->findOneById($id);
    $new_article = clone $article;

    $form = $app['form.factory']->create(new ArticleType($app), $new_article);
    $form->handleRequest($request);

    if ($form->isValid()) {
        $new_article = $form->getData();
        
        $em->persist($new_article);
        $em->flush();
        $app['session']->getFlashBag()->add('article', 'Votre article a bien été ajouté');
        
        return $app->redirect($app["url_generator"]->generate("admin"));
    }

    return $app['twig']->render('admin/article-form.html.twig', array('form' => $form->createView(), 'titre' => 'Dupliquer un article'));
    
})
->bind('duplicate-article');
/*-----  End of admin add article  ------*/



/*==============================================
=            ADMIN - UPDATE ARTICLE            =
==============================================*/
$app->match('/admin/update-article/{id}', function ($id, Request $request) use ($app) {

    $em = $app['orm.em'];
    $article = $em->getRepository("Entity\Article")->findOneById($id);
    
    $form = $app['form.factory']->create(new ArticleType($app), $article);
    $form->handleRequest($request);

    if ($form->isValid()) {
        $article = $form->getData();

        $em->persist($article);
        $em->flush();
        $app['session']->getFlashBag()->add('article', 'Votre article a bien été modifié');

        return $app->redirect($app["url_generator"]->generate("admin"));
    }

    return $app['twig']->render('admin/article-form.html.twig', array('form' => $form->createView(), 'titre' => 'Modifier un article'));

})
->bind('update-article');
/*-----  End of admin update article  ------*/



/*==============================================
=            ADMIN - DELETE ARTICLE            =
==============================================*/
$app->get('/admin/delete-article/{id}', function ($id, Request $request) use ($app) {

    $em = $app['orm.em'];
    $article = $em->getRepository("Entity\Article")->findOneById($id);
    $em->remove($article);
    $em->flush();
    $app['session']->getFlashBag()->add('article', 'Votre article a bien été supprimé');
    return $app->redirect($app["url_generator"]->generate("admin"));

})
->bind('delete-article');
/*-----  End of admin delete article  ------*/




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
