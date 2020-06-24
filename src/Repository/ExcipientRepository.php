<?php

namespace App\Repository;

use App\Entity\Excipient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Excipient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Excipient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Excipient[]    findAll()
 * @method Excipient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExcipientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Excipient::class);
    }

    // /**
    //  * @return Excipient[] Returns an array of Excipient objects
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
    public function findOneBySomeField($value): ?Excipient
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
