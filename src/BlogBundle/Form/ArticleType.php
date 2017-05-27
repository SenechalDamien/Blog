<?php

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contenu')->add('titre')->add('dateModif')->add('datePublication')->add('active')->add('themeArticle')->add('ecritPar')        ;
    }
    /*
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contenu')->add('titre'); //->add('theme')->add('dateModif')->add('datePublication')->add('active')->add('user')
    }
    */

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlogBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blogbundle_article';
    }


}
