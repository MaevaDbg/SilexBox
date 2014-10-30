<?php
namespace Form;

use Silex\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class EmailSubscriptionType extends AbstractType
{
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', array(
                'constraints' => array( new Assert\NotBlank(), new Assert\Email() )
            ))
            ->add('Envoyer', 'submit');
    }

    public function getName()
    {
        return 'emailsubscriptiontype';
    }
}
