<?php

namespace App\Repository\Univertuel\Prophecy\Game\Stat;

use App\Entity\Univertuel\Prophecy\Game\Stat\Tendency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tendency|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tendency|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tendency[]    findAll()
 * @method Tendency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TendencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tendency::class);
    }

    // /**
    //  * @return Tendency[] Returns an array of Tendency objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tendency
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
