<?php

namespace App\Repository\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetAdvantages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SheetAdvantages|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetAdvantages|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetAdvantages[]    findAll()
 * @method SheetAdvantages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetAdvantagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetAdvantages::class);
    }

    // /**
    //  * @return SheetAdvantages[] Returns an array of SheetAdvantages objects
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
    public function findOneBySomeField($value): ?SheetAdvantages
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
