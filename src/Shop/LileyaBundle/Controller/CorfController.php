<?php
namespace Shop\LileyaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Shop\LileyaBundle\Entity\Repository;
class CorfController extends Controller{
    public function addAction(){
        //РџРѕР»СѓС‡Р°РµРј POST РїРµСЂРµРјРµРЅРЅС‹Рµ
       $request = Request::createFromGlobals();
       $id= $request->request->get('id');
       $color=$request->request->get('color');
       $obem=$request->request->get('obem');
       $chashka=$request->request->get('chashka');
       $price=$request->request->get('price');
       $count=$request->request->get('count');
       //РџРѕР»СѓС‡Р°РµРј СЃРµСЃРёРѕРЅРЅС‹Рµ РїРµСЂРµРјРµРЅРЅС‹Рµ
       $session = new Session();
       $sum=$session->get('sum');
       $coun=$session->get('coun');
       $product=$session->get('product');
       if (!empty($product[$id])){//РїСЂРѕРІРµСЂСЏРµРј РµСЃС‚СЊ Р»Рё С‚Р°РєРѕР№ С‚РѕРІР°СЂ РІ РєРѕСЂР·РёРЅРµ
            $product[$id]['coun']+=$count;//РґРѕР±Р°РІР»СЏРµРј РєРѕР»РёС‡РµСЃС‚РІРѕ С‚РѕРІР°СЂР°
       }
       else{

       $sum=$sum+($price*$count);
       $coun=$coun+$count;
       //Р—Р°РїРёСЃС‹РІР°РµРј РїРµСЂРµРјРµРЅРЅС‹Рµ РІ СЃРµСЃРёСЋ
       $session->set('sum',$sum);
       $session->set('coun',$coun);
       $session->set('product',$product);
        $data = json_encode( array('sum'=>$sum,'coun'=>$coun) );
        $headers = array( 'Content-type' => 'application-json; charset=utf8' );
        $responce = new Response( $data, 200, $headers );
        return $responce;
    }
    }
    public function viewAction(){
        $session = new Session();

        $product=$session->get('product');
            return $this->render('ShopLileyaBundle:Corf:show.html.twig', array(
            'products' => $product));
    }
    }