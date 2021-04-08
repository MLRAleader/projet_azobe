<?php

namespace App\Repository;

use App\Entity\StatutJuridique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatutJuridique|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutJuridique|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutJuridique[]    findAll()
 * @method StatutJuridique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutJuridiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatutJuridique::class);
    }

    // /**
    //  * @return StatutJuridique[] Returns an array of StatutJuridique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatutJuridique
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
