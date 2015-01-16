<?php

namespace Shop\LileyaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Product controller.
 */
class ProductController extends Controller{
    /**
     * Show a product entry
     */
    public function showAction($id)
    {
       
        $em=  $this->getDoctrine()->getManager();
        $product=$em->getRepository('ShopLileyaBundle:Product')->find($id);
        if(!$product){
            throw $this->createNotFoundException('Вибачте невдалося знайти продукт');
        }
        $comments=$em->getRepository('ShopLileyaBundle:Comment')
                ->getCommentsForProduct($product->getId());
        return $this->render('ShopLileyaBundle:Product:show.html.twig', array(
            'product' => $product,
            'comments'=>$comments
        ));
    }
    public function indexAction($category=NULL,$subcategory=NULL){
        $em=  $this->getDoctrine()->getManager();
        if($category!==NULL)
        $category=$em->getRepository('ShopLileyaBundle:Category')->getIdCategory($category);
        $products=$em->getRepository('ShopLileyaBundle:Product')
                ->getLatestProducts($category,$subcategory);
        return $this->render('ShopLileyaBundle:Product:product.html.twig',array(
            'product'=>$products
        ));
    }
    public function createAction(Request $request){
        $entity= new Product();
        $form=  $this->createForm(new EnquiryType(), $entity);
        $form->bind($request);
        
        if($form->isValid()){
            $em=  $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }
    }
    public function uploadAction(Request $request){
        $product=new Product();
        $form=  $this->createFormBuilder($product)
                ->add('name')
                ->add('file')
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()){
            $em=  $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirect($this->generateUrl());
        }
        return array('form'=>$form->createView());
    }
}