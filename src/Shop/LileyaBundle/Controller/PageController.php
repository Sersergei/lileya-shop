<?php
namespace Shop\LileyaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Shop\LileyaBundle\Entity\Enquiry;
use Shop\LileyaBundle\Form\EnquiryType;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use PhpBridgeSessionStorage;
=======
>>>>>>> 1
class PageController extends Controller{
    public function indexAction()
    {
        //функция главной страници
        return $this->render('ShopLileyaBundle:Page:index.html.twig');
    }
    public function contactAction(){
<<<<<<< HEAD
        
=======
>>>>>>> 1
        //функция контакта
        $enquiry=new Enquiry();
        $form = $this->createForm(new EnquiryType(),$enquiry);
        $request=$this->getRequest();
        if ($request->getMethod()=='POST'){
            $form->bind($request);
                if($form->isValid()){
                    $message=\Swift_Message::newInstance()
<<<<<<< HEAD
                            ->setSubject('Інтернет магазин Біла конвалія')
                            ->setFrom('sersergei83@gmail.com')
                            ->setTo('kseniya.kuzmenko@ukr.net')
                            ->setBody($this->renderView('ShopLileyaBundle:Page:contactEmail.txt.twig',array('enquiry'=>$enquiry)));
                    $this->get('mailer')->send($message);
                    $this->get('session')->getFlashBag()->add(
                            'Shop-notice',
=======
                            ->setSubject('Інтернет магазин Біла лілея')
                            ->setFrom('sersergei83@gmail.com')
                            ->setTo('kseniya.kuzmenko@ukr.net')
                            ->setBody($this->renderView('ShopLileyagBundle:Page:contactEmail.txt.twig',array('enquiry'=>$enquiry)));
                    $this->get('mailer')->send($message);
                    $this->get('session')->getFlashBag()->add(
                            'blogger-notice',
>>>>>>> 1
                            'Ваше повідомлення відправлене, Дякуємо!'
                            );
                    return $this->redirect($this->generateUrl('ShopLileyaBundle_contact'));
                }
        }
        return $this->render('ShopLileyaBundle:Page:contact.html.twig',array(
            'form'=>$form->createView()
        ));
    }
<<<<<<< HEAD
=======
    public function aboutAction()
    {
        return $this->render('ShopLileyaBundle:Page:about.html.twig');
    }
>>>>>>> 1
}