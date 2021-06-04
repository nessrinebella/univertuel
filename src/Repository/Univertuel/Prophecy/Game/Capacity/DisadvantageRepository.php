<?php

namespace App\Repository\Univertuel\Prophecy\Game\Capacity;

use App\Entity\Univertuel\Prophecy\Game\Capacity\Disadvantage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Disadvantage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disadvantage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disadvantage[]    findAll()
 * @method Disadvantage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisadvantageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disadvantage::class);
    }

    // /**
    //  * @return Disadvantage[] Returns an array of Disadvantage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Disadvantage
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
