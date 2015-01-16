<?php

namespace Shop\LileyaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type;
use Sonata\AdminBundle\Show\ShowMapper;
use Shop\LileyaBundle\Entity\Product;

class ProductAdmin extends Admin{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper
     * 
     * @return void 
     */
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
                ->add('title',null,array('label'=>'Название'))
                ->add('describes', 'textarea', array('attr'=>array('class'=>'ckeditor'),'label'=>'Описание'))
                ->add('price',null,array('label'=>'Цена'))
                ->add('file','file',array('label'=>'картинка'))
                ->add('category',null,array('label'=>'Категория'))
                ->add('subcategory',null,array('label'=>'Подкатегория'))
                ->add('style',null,array('label'=>'Стиль'));        
    }
    /**
     * @param \Sonata\Adminbundle\Show\ShowMapper $showMapper 
     * 
     * @return void 
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('title',null,array('label'=>'Название'))
                ->add('describes',null,array('label'=>'Описание'))
                ->add('price',null,array('label'=>'Цена'))
                ->add('category',null,array('label'=>'Категория'))
                ->add('subcategory',null,array('label'=>'Подкатегория'))
                ->add('image',null,array('label'=>'Картинка'))
                ->add('style',null,array('label'=>'Стиль'))
                ->add('newsLinks', 'sonata_type_collection',
                      array('sklad' => 'Склад', 'by_reference' => false),
                      array(
                           'edit' => 'inline',
                           //В сущности NewsLink есть поле pos, отражающее положение ссылки в списке
                          //указание опции sortable позволяет менять положение ссылок в списке перетаскиваением
                           'sortable' => 'pos',
                           'inline' => 'table',
                      ))
                ;
    }
    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     * 
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper) {
      $listMapper
              ->addIdentifier('title',null,array('label'=>'Название'))
              ->add('describes',null,array('label'=>'Описание'))
              ->add('price',null,array('label'=>'Цена'))
              ->add('category',null,array('label'=>'Категория'))
              ->add('subcategory',null,array('label'=>'Подкатегория'))
              ->add('style',null,array('label'=>'Стиль'))
              ->add('image',null,array('label'=>'картинка'))
              ->add('_action','actions',array(
                  'actions'=>array(
                      'show'=>array(),
                      'edit'=>array(),
                      'delete'=>array(),
                  )
                  ));
    }

    /**
     * @param \Sonata\AdminBundle\DatagridMapper $datagriMapper
     * 
     * @return void 
     */
    protected function configureDatagridFilters(DatagridMapper $datagriMapper) {
        $datagriMapper
                ->add('title',null,array('label'=>'Название'))
                ->add('describes',null,array('label'=>'Описание'))
                ->add('price',null,array('label'=>'Цена'))
                ->add('category',null,array('label'=>'Категория'))
                ->add('subcategory',null,array('label'=>'Подкатегория'))
                ->add('style',null,array('label'=>'Стиль'))
                ->add('image',null,array('label'=>'Картинка'));
    }
    
}
