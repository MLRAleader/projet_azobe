<?php

namespace App\Repository;

use App\Entity\ThemeActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ThemeActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThemeActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThemeActivite[]    findAll()
 * @method ThemeActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThemeActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThemeActivite::class);
    }

    // /**
    //  * @return ThemeActivite[] Returns an array of ThemeActivite objects
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
    public function findOneBySomeField($value): ?ThemeActivite
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
