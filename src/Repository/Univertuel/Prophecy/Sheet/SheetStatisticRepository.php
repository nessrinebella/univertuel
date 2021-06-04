<?php

namespace App\Repository\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetStatistic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SheetStatistic|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetStatistic|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetStatistic[]    findAll()
 * @method SheetStatistic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetStatisticRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetStatistic::class);
    }

    // /**
    //  * @return SheetStatistic[] Returns an array of SheetStatistic objects
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
    public function findOneBySomeField($value): ?SheetStatistic
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
