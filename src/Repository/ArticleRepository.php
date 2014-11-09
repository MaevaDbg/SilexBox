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
     * Return all publicated articles for blog page in dev and prod environment
     * @param  [string] $lang [Define language of articles]
     * @param  [string] $env  [Define environment of application]
     * @return [array]        [Return an array of Article object]
     */
    public function findAllArticleForBlog($lang, $env){

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
        $articles = $query->getArrayResult();

        return $articles;

    }

    /**
     * Return all selected articles for homepage in dev and prod environment
     * @param  [string] $lang [Define language of articles]
     * @param  [string] $env  [Define environment of application]
     * @return [array]        [Return an array of Article object]
     */
    public function findAllArticleForHome($lang, $env){

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
            ->setParameter(1, $lang);

        $query = $qb->getQuery();
        $articles = $query->getArrayResult();

        return $articles;

    }
}
