<?php

namespace App\Repository;

use App\Entity\PrincipeActif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrincipeActif|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrincipeActif|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrincipeActif[]    findAll()
 * @method PrincipeActif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrincipeActifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrincipeActif::class);
    }

    // /**
    //  * @return PrincipeActif[] Returns an array of PrincipeActif objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrincipeActif
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
