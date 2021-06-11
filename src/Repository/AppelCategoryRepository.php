<?php

namespace App\Repository;

use App\Entity\AppelCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppelCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppelCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppelCategory[]    findAll()
 * @method AppelCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppelCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppelCategory::class);
    }

    // /**
    //  * @return AppelCategory[] Returns an array of AppelCategory objects
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
    public function findOneBySomeField($value): ?AppelCategory
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
