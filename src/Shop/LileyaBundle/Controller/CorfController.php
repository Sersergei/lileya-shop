<?php
namespace Shop\LileyaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
class CorfController extends Controller{
    public function addAction(){
        //�������� POST ����������
       $request = Request::createFromGlobals();
       $id= $request->request->get('id');
       $color=$request->request->get('color');
       $obem=$request->request->get('obem');
       $chashka=$request->request->get('chashka');
       $price=$request->request->get('price');
       $count=$request->request->get('count');
       //�������� ��������� ����������
       $session = new Session();
       $sum=$session->get('sum');
       $coun=$session->get('coun');
       $product=$session->get('product');
       if (!empty($product[$id])){//��������� ���� �� ����� ����� � �������
        $product[$id]['coun']+=$count;//��������� ���������� ������
       }
       else{
        $product[$id]['color']=$color;
        $product[$id]['obem']=$obem;
        $product[$id]['chashka']=$chashka;
        $product[$id]['price']=$price;
        $product[$id]['coun']=$count;
       }
       //��������� ���������� ������� � � ����� � �������
       $sum=$sum+($price*$count);
       $coun=$coun+$count;
       //���������� ���������� � �����
       $session->set('sum',$sum);
       $session->set('coun',$coun);
       $session->set('product',$product);
        $data = json_encode( array('sum'=>$sum,'coun'=>$coun) );
        $headers = array( 'Content-type' => 'application-json; charset=utf8' );
        $responce = new Response( $data, 200, $headers );
        return $responce;
    }
    public function viewAction(){
            return $this->render('ShopLileyaBundle:Corf:show.html.twig', array(
            'product' => $product));
    }
    }