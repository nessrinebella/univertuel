<?php

namespace App\Repository\Univertuel\Prophecy\Game\Stat;

use App\Entity\Univertuel\Prophecy\Game\Stat\Omen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Omen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Omen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Omen[]    findAll()
 * @method Omen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OmenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Omen::class);
    }

    // /**
    //  * @return Omen[] Returns an array of Omen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Omen
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
