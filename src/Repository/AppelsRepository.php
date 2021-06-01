<?php

namespace App\Repository;

use App\Entity\Appels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Appels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appels[]    findAll()
 * @method Appels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appels::class);
    }

    // /**
    //  * @return Appels[] Returns an array of Appels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Appels
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
