<?php

namespace App\Repository\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetDisadvantages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SheetDisadvantages|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetDisadvantages|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetDisadvantages[]    findAll()
 * @method SheetDisadvantages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetDisadvantagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetDisadvantages::class);
    }

    // /**
    //  * @return SheetDisadvantages[] Returns an array of SheetDisadvantages objects
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
    public function findOneBySomeField($value): ?SheetDisadvantages
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
