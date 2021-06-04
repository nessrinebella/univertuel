<?php

namespace App\Repository\Univertuel\Prophecy\Game\Item;

use App\Entity\Univertuel\Prophecy\Game\Item\HastWeapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HastWeapon|null find($id, $lockMode = null, $lockVersion = null)
 * @method HastWeapon|null findOneBy(array $criteria, array $orderBy = null)
 * @method HastWeapon[]    findAll()
 * @method HastWeapon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HastWeaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HastWeapon::class);
    }

    // /**
    //  * @return HastWeapon[] Returns an array of HastWeapon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HastWeapon
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
