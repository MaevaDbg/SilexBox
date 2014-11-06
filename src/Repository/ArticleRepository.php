<?php
namespace Repository;

use Silex\Application;
use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository{
    
    public function __construct(Application $app) {
        $this->db = $app['db'];
        $this->em = $app['orm.em'];
    }
    
    public function findByLang($lang, $env){

        $qb = $this->db->createQueryBuilder();
        $qb->select('*')
            ->from('article', 'a')
            ->where('a.lang = ?')
            ->setParameter(0, $lang);

        $sql = $qb->getSQL();
        $parameters = $qb->getParameters();
        $query = $this->db->executeQuery($sql,$parameters);
        var_dump($query);

        $articles = $this->db->fetchAll($query->queryString);

        return $articles;

    }
}
