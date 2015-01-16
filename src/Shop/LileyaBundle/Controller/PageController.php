<?php
namespace Shop\LileyaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Shop\LileyaBundle\Entity\Enquiry;
use Shop\LileyaBundle\Form\EnquiryType;
class PageController extends Controller{
    public function indexAction()
    {
        //функция главной страници
        return $this->render('ShopLileyaBundle:Page:index.html.twig');
    }
    public function contactAction(){
        //функция контакта
        $enquiry=new Enquiry();
        $form = $this->createForm(new EnquiryType(),$enquiry);
        $request=$this->getRequest();
        if ($request->getMethod()=='POST'){
            $form->bind($request);
                if($form->isValid()){
                    $message=\Swift_Message::newInstance()
                            ->setSubject('Інтернет магазин Біла конвалія')
                            ->setFrom('sersergei83@gmail.com')
                            ->setTo('kseniya.kuzmenko@ukr.net')
                            ->setBody($this->renderView('ShopLileyaBundle:Page:contactEmail.txt.twig',array('enquiry'=>$enquiry)));
                    $this->get('mailer')->send($message);
                    $this->get('session')->getFlashBag()->add(
                            'Shop-notice',
                            'Ваше повідомлення відправлене, Дякуємо!'
                            );
                    return $this->redirect($this->generateUrl('ShopLileyaBundle_contact'));
                }
        }
        return $this->render('ShopLileyaBundle:Page:contact.html.twig',array(
            'form'=>$form->createView()
        ));
    }
}