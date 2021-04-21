<?php

namespace App\Repository;

use App\Entity\Solutionsitems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Solutionsitems|null find($id, $lockMode = null, $lockVersion = null)
 * @method Solutionsitems|null findOneBy(array $criteria, array $orderBy = null)
 * @method Solutionsitems[]    findAll()
 * @method Solutionsitems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolutionsitemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Solutionsitems::class);
    }

    // /**
    //  * @return Solutionsitems[] Returns an array of Solutionsitems objects
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
    public function findOneBySomeField($value): ?Solutionsitems
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
