<?php
namespace Form;

use Silex\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ArticleType extends AbstractType
{
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('excerpt')
            ->add('image')
            ->add('content')
            ->add('dateCreation')
            ->add('datePublication')
            ->add('dateUpdate')
            ->add('status')
            ->add('video')
            ->add('homePush')
            ->add('homePushOrder')
            ->add('lang')
            ->add('Envoyer', 'submit');
        ;
    }

    public function getName()
    {
        return 'articletype';
    }
}
