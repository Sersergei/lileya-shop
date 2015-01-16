<?php
namespace Shop\LileyaBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name','text', array('label'=>'Імя'));
        $builder->add('email','email');
        $builder->add('subject','text', array('label'=>'Тема'));
        $builder->add('body','textarea',array('label'=>'Повідомлення')); 
    }
    public function getName() {
        return 'contact';
        
    }
}

