<?php
namespace Shop\LileyaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
class CorfController extends Controller{
    public function addAction(){
        //Получаем POST переменные
       $request = Request::createFromGlobals();
       $id= $request->request->get('id');
       $color=$request->request->get('color');
       $obem=$request->request->get('obem');
       $chashka=$request->request->get('chashka');
       $price=$request->request->get('price');
       $count=$request->request->get('count');
       //Получаем сесионные переменные
       $session = new Session();
       $sum=$session->get('sum');
       $coun=$session->get('coun');
       //вычисляем количество товаров в и сумму в корзине
       $sum=$sum+($price*$count);
       $coun=$coun+$count;
       //Записываем переменные в сесию
       $session->set('sum',$sum);
       $session->set('coun',$coun);
        $data = json_encode( array('sum'=>$sum,'coun'=>$coun) );
        $headers = array( 'Content-type' => 'application-json; charset=utf8' );
        $responce = new Response( $data, 200, $headers );
        return $responce;
    }
    }