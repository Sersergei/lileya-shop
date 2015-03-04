<?php
namespace Shop\LileyaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class ProductCorf extends Product{
    protected $product_id;
    protected $color;
    protected $obem;
    protected $chashka;
    protected $price;
    protected $count;
    function __construct($product_id,$color,$obem,$chaska,$price,$count){
        $this->product_id=$product_id;
        $this->color=$color;
        $this->obem=$obem;
        $this->chashka=$chaska;
        $this->price=$price;
        $this->count=$count;  
    }
    public function getCount(){
        return $this->count;
    }
      public function getPrice(){
        return $this->price;
    }
    
    
}