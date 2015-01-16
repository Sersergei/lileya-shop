<?php

namespace Shop\LileyaBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;


class CommentRepository extends EntityRepository
{
    public function getCommentsForProduct($productId, $approved=true) {
        $qp=  $this->createQueryBuilder('c')
                ->select('c')
                ->where('c.product=:product_id')
                ->addOrderBy('c.created')
                ->setParameter('product_id',$productId);
        if(false===is_null($approved))
            $qp->andWhere ('c.approved=:approved')
            ->setParameter ('approved', $approved);
        return $qp->getQuery()
                ->getResult();
        
    }
}
