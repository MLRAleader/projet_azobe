<?php

namespace App\Repository;

use App\Entity\TagsArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TagsArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagsArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagsArticle[]    findAll()
 * @method TagsArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagsArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagsArticle::class);
    }

    // /**
    //  * @return TagsArticle[] Returns an array of TagsArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TagsArticle
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
