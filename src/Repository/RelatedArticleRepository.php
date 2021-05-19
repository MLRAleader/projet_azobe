<?php

namespace App\Repository;

use App\Entity\RelatedArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RelatedArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method RelatedArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method RelatedArticle[]    findAll()
 * @method RelatedArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RelatedArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelatedArticle::class);
    }

    // /**
    //  * @return RelatedArticle[] Returns an array of RelatedArticle objects
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
    public function findOneBySomeField($value): ?RelatedArticle
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
