<?php

namespace App\Repository\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SheetCaracteristics|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetCaracteristics|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetCaracteristics[]    findAll()
 * @method SheetCaracteristics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetCaracteristicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetCaracteristics::class);
    }

    // /**
    //  * @return SheetCaracteristics[] Returns an array of SheetCaracteristics objects
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
    public function findOneBySomeField($value): ?SheetCaracteristics
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
