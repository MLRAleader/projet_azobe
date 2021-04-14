<?php

namespace App\Repository;

use App\Entity\GroupeActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupeActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupeActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupeActivite[]    findAll()
 * @method GroupeActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupeActivite::class);
    }

    // /**
    //  * @return GroupeActivite[] Returns an array of GroupeActivite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupeActivite
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
