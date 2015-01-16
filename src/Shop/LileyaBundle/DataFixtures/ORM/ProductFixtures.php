<?php
namespace Shop\LileyaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Shop\LileyaBundle\Entity\Product;

class ProductFixtures extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager)
    {
        $product1= new Product();
        $product1->setTitle('254');
        $product1->setDescribes('2547');
        $product1->setCatigories('1');
        $product1->setImage('1jpg');
        $product1->setPrice('1');
        $manager->persist($product1);
        
        $product2= new Product();
        $product2->setTitle('труси бэтмэна');
        $product2->setDescribes('Описание трусов бэтмэна. Они должны быть большими и красными со значком на писюне. А изнутри с переди жолтое а с зади коричневого цвета');
        $product2->setCatigories('1');
        $product2->setImage('2.jpg');
        $product2->setPrice('2000000');
        $manager->persist($product2);
        
        $product3= new Product();
        $product3->setTitle('труси агента007');
        $product3->setDescribes('Описание трусов фгента007. Они должны быть большими и красными со значком на писюне. А изнутри с переди жолтое а с зади коричневого цвета');
        $product3->setCatigories('1');
        $product3->setImage('3.jpg');
        $product3->setPrice('1000000');
        $manager->persist($product3);
        
        
        $product4= new Product();
        $product4->setTitle('труси снегурочки');
        $product4->setDescribes('Описание трусов снегурочки. Они должны быть большими и красными со значком на писюне. А изнутри с переди жолтое а с зади коричневого цвета');
        $product4->setCatigories('1');
        $product4->setImage('1.jpg');
        $product4->setPrice('1000000');
        $manager->persist($product4);
        
        $product5= new Product();
        $product5->setTitle('труси Деда мороза');
        $product5->setDescribes('Описание трусов деда мороза. Они должны быть большими и красными со значком на писюне. А изнутри с переди жолтое а с зади коричневого цвета');
        $product5->setCatigories('1');
        $product5->setImage('1.jpg');
        $product5->setPrice('1000000');
        $manager->persist($product5);
        
        $manager->flush();
        
        
        $this->addReference ('product-1', $product1);
        $this->addReference ('product-2', $product2);
        $this->addReference ('product-3', $product3);
        $this->addReference ('product-4', $product4);
        $this->addReference ('product-5', $product5);
    }
    public function getOrder()
    {
        return 1;
    }
    
}