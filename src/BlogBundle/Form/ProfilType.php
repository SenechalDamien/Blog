<?php
namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Profiltype extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('themes');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlogBundle\Entity\User'
        ));
    }
}
/**
 * Created by PhpStorm.
 * User: pierrelardy
 * Date: 11/06/2017
 * Time: 18:31
 */