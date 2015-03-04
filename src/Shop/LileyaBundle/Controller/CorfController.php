<?php
namespace Shop\LileyaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Shop\LileyaBundle\Entity\Repository;
use Shop\LileyaBundle\Entity\ProductCorf;
use Shop\LileyaBundle\Entity\Corf;
class CorfController extends Controller{
    public function addAction(){
        //получаем полученные данные
       $request = Request::createFromGlobals();
       $id= $request->request->get('id');
       $color=$request->request->get('color');
       $obem=$request->request->get('obem');
       $chashka=$request->request->get('chashka');
       $price=$request->request->get('price');
       $count=$request->request->get('count');
     $product= new ProductCorf($id,$color,$obem,$chashka,$price,$count);
     $corf=new Corf;
     $corf->addprodut($product);
     $sum=$corf->getSum();
     $coun=$corf->getCount();
    $data = json_encode( array('sum'=>$sum,'coun'=>$coun) );
        $headers = array( 'Content-type' => 'application-json; charset=utf8' );
        $responce = new Response( $data, 200, $headers );
        //$response->send();
        return $responce;
    }
    public function viewAction(){
        $session = $request->getSession(); 
        $product=$session->get('product');
            return $this->render('ShopLileyaBundle:Corf:show.html.twig');
    }
    }