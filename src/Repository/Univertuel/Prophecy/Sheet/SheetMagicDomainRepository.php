<?php

namespace App\Repository\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetMagicDomain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SheetMagicDomain|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetMagicDomain|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetMagicDomain[]    findAll()
 * @method SheetMagicDomain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetMagicDomainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetMagicDomain::class);
    }

    // /**
    //  * @return SheetMagicDomain[] Returns an array of SheetMagicDomain objects
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
    public function findOneBySomeField($value): ?SheetMagicDomain
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
