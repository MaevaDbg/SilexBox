<?php
namespace Repository;

use Silex\Application;
use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository{
    
    public function __construct(Application $app) {
        $this->app = $app;
    }
    
}
