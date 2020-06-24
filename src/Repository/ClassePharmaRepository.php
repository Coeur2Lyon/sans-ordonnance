<?php

namespace App\Repository;

use App\Entity\ClassePharma;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassePharma|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassePharma|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassePharma[]    findAll()
 * @method ClassePharma[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassePharmaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassePharma::class);
    }

    // /**
    //  * @return ClassePharma[] Returns an array of ClassePharma objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClassePharma
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
