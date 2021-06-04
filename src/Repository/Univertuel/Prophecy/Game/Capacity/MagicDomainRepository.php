<?php

namespace App\Repository\Univertuel\Prophecy\Game\Capacity;

use App\Entity\Univertuel\Prophecy\Game\Capacity\MagicDomain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CapacityMagicDomain|null find($id, $lockMode = null, $lockVersion = null)
 * @method CapacityMagicDomain|null findOneBy(array $criteria, array $orderBy = null)
 * @method CapacityMagicDomain[]    findAll()
 * @method CapacityMagicDomain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MagicDomainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MagicDomain::class);
    }

    // /**
    //  * @return CapacityMagicDomain[] Returns an array of CapacityMagicDomain objects
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
    public function findOneBySomeField($value): ?CapacityMagicDomain
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
