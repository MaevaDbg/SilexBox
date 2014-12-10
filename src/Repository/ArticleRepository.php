<?php
namespace Repository;

use Silex\Application;
use Entity\Article;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ArticleRepository extends EntityRepository{
    
    public function __construct(Application $app) {
        $this->db = $app['db'];
        $this->em = $app['orm.em'];
    }

    /**
     * Return an article depends on his slug
     * @param  [string] $slug [description]
     * @param  [string] $env  [Define environment of application]
     * @return [type]       [description]
     */
    public function findBySlug($slug, $env){

        $date = new \DateTime();

        $qb = new QueryBuilder($this->em);
        $qb->select('a')->from('Entity\Article', 'a');

        if($env == "dev"){
            $qb->where('a.status = 1');
            $qb->orWhere('a.status = 2');
        }else{
            $qb->where('a.status = 2')
                ->andWhere($qb->expr()->lte('a.datePublication', '?1'))
                ->setParameter(1, $date->format('Y-m-d H:i:s'));
        }

        $qb->andWhere('a.slug = ?2')
            ->setParameter(2, $slug);

        $query = $qb->getQuery();
        $article = $query->getSingleResult();

        return $article;
    }
    
    /**
     * Return all publicated articles for blog page in dev or prod environment
     * @param  [string] $lang [Define language of articles]
     * @param  [string] $env  [Define environment of application]
     * @return [array]        [Return an array of Article]
     */
    public function findAllArticle($lang, $env){

        $qb = new QueryBuilder($this->em);
        $qb->select('a')->from('Entity\Article', 'a');

        //Dev environment return prod and preprod article
        if($env == "dev"){
            $qb->andWhere('a.status = 1');
            $qb->orWhere('a.status = 2');
        //Prod environment return prod articles depend on publication date
        }else{
            $date = new \DateTime();
            $qb->andWhere('a.status = 2')
                ->andWhere($qb->expr()->lte('a.datePublication', '?2'))
                ->setParameter(2, $date->format('Y-m-d H:i:s'));
        }

        $qb->andWhere('a.lang = ?1')
            ->orderBy('a.datePublication', 'DESC')
            ->setParameter(1, $lang);

        $query = $qb->getQuery();
        $articles = $query->getResult();

        return $articles;

    }

    /**
     * Return all pushed articles for homepage in dev or prod environment
     * @param  [string] $lang [Define language of articles]
     * @param  [string] $env  [Define environment of application]
     * @return [array]        [Return an array of Article]
     */
    public function findPushedArticle($lang, $env){

        $qb = new QueryBuilder($this->em);
        $qb->select('a')->from('Entity\Article', 'a');

        //Si on est en dev je récupère les articles prod et preprod
        if($env == "dev"){
            $qb->andWhere('a.status = 1');
            $qb->orWhere('a.status = 2');
        }else{
            $date = new \DateTime();
            $qb->andWhere('a.status = 2')
                ->andWhere($qb->expr()->lte('a.datePublication', '?2'))
                ->setParameter(2, $date->format('Y-m-d H:i:s'));
        }

        $qb->andWhere('a.lang = ?1')
            ->andWhere('a.homePush = true')
            ->orderBy('a.datePublication', 'DESC')
            ->setParameter(1, $lang)
            ->setMaxResults(1);

        $query = $qb->getQuery();
        $articles = $query->getSingleResult();

        return $articles;

    }

    /**
     * Return last articles in dev or prod environment
     * @param  [string] $lang [Define language of articles]
     * @param  [string] $env  [Define environment of application]
     * @return [array]        [Return an array of Article]
     */
    public function findLastArticle($lang, $env){

        $qb = new QueryBuilder($this->em);
        $qb->select('a')->from('Entity\Article', 'a');

        //Si on est en dev je récupère les articles prod et preprod
        if($env == "dev"){
            $qb->andWhere('a.status = 1');
            $qb->orWhere('a.status = 2');
        }else{
            $date = new \DateTime();
            $qb->andWhere('a.status = 2')
                ->andWhere($qb->expr()->lte('a.datePublication', '?2'))
                ->setParameter(2, $date->format('Y-m-d H:i:s'));
        }

        $qb->andWhere('a.lang = ?1')
            ->andWhere('a.homePush <> true')
            ->orderBy('a.datePublication', 'DESC')
            ->setParameter(1, $lang)
            ->setMaxResults(2);

        $query = $qb->getQuery();
        $articles = $query->getResult();

        return $articles;

    }
}
