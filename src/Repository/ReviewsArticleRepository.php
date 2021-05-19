<?php

namespace App\Repository;

use App\Entity\ReviewsArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReviewsArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReviewsArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReviewsArticle[]    findAll()
 * @method ReviewsArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewsArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReviewsArticle::class);
    }

    // /**
    //  * @return ReviewsArticle[] Returns an array of ReviewsArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReviewsArticle
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
