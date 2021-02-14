<?php

namespace App\Repository;

use App\Entity\Furlough;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Furlough|null find($id, $lockMode = null, $lockVersion = null)
 * @method Furlough|null findOneBy(array $criteria, array $orderBy = null)
 * @method Furlough[]    findAll()
 * @method Furlough[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FurloughRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Furlough::class);
    }

    // /**
    //  * @return Furlough[] Returns an array of Furlough objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Furlough
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
