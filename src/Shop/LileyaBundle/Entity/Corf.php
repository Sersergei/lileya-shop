<?php
namespace Shop\LileyaBundle\Entity;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class Corf
{
    protected $sum;
    protected $count;
    protected $products;
    protected $session;
    public function __construct(){
         $this->session = new Session;
       // $session = $request->getSession();
        $this->sum=$this->session->get('sum',0);
        $this->count=$this->session->get('count',0);  
    }
    public function  addprodut(ProductCorf $product){
        $this->products[]=$product;
        $this->count+=$product->getCount();
        $this->sum+=($product->getPrice()*$product->getCount());
    }
    public function getSum(){
        return $this->sum;
    }
      public function getCount(){
        return $this->count;
    }
    public function __destruct(){
         //$request = Request::createFromGlobals();
        //$session = $session = new Session;
        $this->session->set('sum',$this->sum);
        $this->session->set('count',$this->count);
        $this->session->set('product',$this->products);  
    }
    }