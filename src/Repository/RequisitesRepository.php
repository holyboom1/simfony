<?php

namespace App\Repository;

use App\Entity\Requisites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Requisites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Requisites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Requisites[]    findAll()
 * @method Requisites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequisitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Requisites::class);
    }

    // /**
    //  * @return Requisites[] Returns an array of Requisites objects
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
    public function findOneBySomeField($value): ?Requisites
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
