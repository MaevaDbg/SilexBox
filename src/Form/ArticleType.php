<?php
namespace Form;

use Silex\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
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
            ->add('title','text', array(
                'required'=> true,
            ))
            ->add('slug','text', array(
                'required'=> true,
            ))
            ->add('excerpt','textarea', array(
                'required'=> true,
            ))
            ->add('image','text', array(
                'required'=> false,
            ))
            ->add('content','textarea', array(
                'required'=> true,
            ))
            ->add('datePublication', 'date', array(
                'widget' => 'choice',
                'format' => 'dd MM yyyy',
                'input' => 'datetime',
                'data' => isset($options['data']) ? $options['data']->getDatePublication() : new \DateTime()
            ))
            ->add('status', 'choice', array(
                'choices' => array('0' => 'Brouillon', '1' => 'Preprod', '2' => 'Prod')
            ))
            ->add('video','text', array(
                'required' => false
            ))
            ->add('imageVideo','text', array(
                'required'=> false,
            ))
            ->add('lienYoutube','text', array(
                'required' => false
            ))
            ->add('homePush', 'checkbox', array(
                'required' => false
            ))
            ->add('lang', 'choice', array(
                'choices' => array('fr' => 'Français', 'en' => 'Anglais')
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Entity\Article'
        ));
    }

    public function getName()
    {
        return 'articletype';
    }
}
