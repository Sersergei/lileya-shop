<?php
namespace Shop\LileyaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Shop\LileyaBundle\Entity\Comment;
use Shop\LileyaBundle\Entity\Product;

class CommentFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load (ObjectManager $manager) {
        $comment = new Comment();
        $comment->setUser('symfony');
        $comment->setComment('Первый коментарий ');
        $comment->setProduct( $manager->merge($this->getReference('product-1')));
        $manager->persist($comment);
        
        $comment = new Comment();
        $comment->setUser('Сергей');
        $comment->setComment('Классные труселя ');
        $comment->setProduct($manager->merge($this->getReference('product-1')));
        $manager->persist($comment);
        
        
        $comment= new Comment();
        $comment->setUser('Ксения');
        $comment->setComment('Галимые труселя');
        $comment->setProduct($manager->merge($this->getReference('product-2')));
        $manager->persist($comment);
        
        
        $comment= new Comment();
        $comment->setUser('Люся');
        $comment->setComment('Ой купила такие трусы просто супер');
        $comment->setProduct($manager->merge($this->getReference('product-2')));
        $manager->persist($comment);
        
        $comment= new Comment();
        $comment->setUser('Приська');
        $comment->setComment('Галимые труселя');
        $comment->setProduct($manager->merge($this->getReference('product-2')));
        $manager->persist($comment);
        
        $comment= new Comment();
        $comment->setUser('Ксения');
        $comment->setComment('Галимые труселя');
        $comment->setProduct($manager->merge($this->getReference('product-2')));
        $comment->setCreated(new \DateTime("2014-07-23 06:15:20"));
        $manager->persist($comment);
        
        $comment= new Comment();
        $comment->setUser('Ксения');
        $comment->setComment('Галимые труселя');
        $comment->setProduct($manager->merge($this->getReference('product-2')));
        $comment->setCreated(new \DateTime("2014-10-08 13:34:20"));
        $manager->persist($comment);
        
        $manager->flush();
    }
    public function  getOrder(){
        return 2;
    }
}
