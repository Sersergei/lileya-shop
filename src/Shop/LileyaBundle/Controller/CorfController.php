<?php
namespace Shop\LileyaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Shop\LileyaBundle\Entity\Repository;
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
       $product=$session->get('product');
       if (!empty($product[$id])){//проверяем есть ли такой товар в корзине
            $product[$id]['coun']+=$count;//добавляем количество товара
       }
       else{
            $product[$id]['color']=$color;
            $product[$id]['obem']=$obem;
            $product[$id]['chashka']=$chashka;
            $product[$id]['price']=$price;
            $product[$id]['coun']=$count;
        }
       //вычисляем количество товаров в и сумму в корзине
       $sum=$sum+($price*$count);
       $coun=$coun+$count;
       //Записываем переменные в сесию
       $session->set('sum',$sum);
       $session->set('coun',$coun);
       $session->set('product',$product);
        $data = json_encode( array('sum'=>$sum,'coun'=>$coun) );
        $headers = array( 'Content-type' => 'application-json; charset=utf8' );
        $responce = new Response( $data, 200, $headers );
        return $responce;
    }
    public function viewAction(){
        $session = new Session();
        $prod=$session->get('product');
        $product_id=array_keys($prod);
        if(count($product_id)>1){
        $product_id=implode($product_id, ', ');}
        $em=  $this->getDoctrine()->getManager();
        $products=$em->getRepository('ShopLileyaBundle:Product')
                     ->getProducts($product_id);
      
            return $this->render('ShopLileyaBundle:Corf:show.html.twig', array(
            'products' => $products,
            'prod'=>$prod));
    }
    }