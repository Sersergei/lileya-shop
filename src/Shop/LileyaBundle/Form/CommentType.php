<?php

<<<<<<< HEAD
namespace Shop\LileyaBundle\Form;
=======
namespace Blogger\BlogBundle\Form;
>>>>>>> 1

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user','text', array('label'=>'Імя'))
            ->add('comment','textarea',array('label'=>'Коментар'))
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
<<<<<<< HEAD
            'data_class' => 'Shop\LileyaBundle\Entity\Comment'
=======
            'data_class' => 'Blogger\BlogBundle\Entity\Comment'
>>>>>>> 1
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
<<<<<<< HEAD
        return 'Shop_LileyaBundle_comment';
=======
        return 'blogger_blogbundle_comment';
>>>>>>> 1
    }
}
