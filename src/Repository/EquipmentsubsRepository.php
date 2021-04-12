<?php

namespace App\Repository;

use App\Entity\Equipmentsubs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Equipmentsubs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipmentsubs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipmentsubs[]    findAll()
 * @method Equipmentsubs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentsubsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipmentsubs::class);
    }

    // /**
    //  * @return Equipmentsubs[] Returns an array of Equipmentsubs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Equipmentsubs
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
