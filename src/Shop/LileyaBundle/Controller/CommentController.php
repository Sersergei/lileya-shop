<?php
namespace Shop\LileyaBundle\Controller;


use Shop\LileyaBundle\Entity\Comment;
use Shop\LileyaBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Comment controller.
 */
class CommentController extends Controller{
    public function newAction($product_id) {
       $product=  $this->getProduct($product_id);
       $comment=new Comment();
       $comment->setProduct($product);
        $form=  $this->createForm(new CommentType(), $comment);
        
        return $this->render('ShopLileyaBundle:Comment:form.html.twig',array(
            'comment'=>$comment,
            'form'=>$form->createView()
        ));
    }
    
    public function createAction($product_id) {
        $product=  $this->getProduct($product_id);
            
            $comment = new Comment();
            $comment->setProduct($product);
            $request=  $this->getRequest();
            $form=  $this->createForm(new CommentType(), $comment);
            $form->Bind($request);
            
            if ($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();
                
                return $this->redirect($this->generateUrl('ShopLileyaBundle_product_show', array(
                   'id'=>$comment->getProduct()->getId())) . 
                       '#comment-' . $comment->getId());
           }
            return $this->render('ShopLileyaBundle:Comment:create.html.twig',array(
                'comment'=>$comment,
                'form'=>$form->createView()
            ));
    }
    protected function getProduct($id) {
 $en=  $this->getDoctrine()->getManager();
        $product=$en->getRepository('ShopLileyaBundle:Product')->find($id);
        if(!$product){
            throw $this->createNotFoundException('Невдаэться знайти продукт'); 
        }
        

return $product;
}
    }
