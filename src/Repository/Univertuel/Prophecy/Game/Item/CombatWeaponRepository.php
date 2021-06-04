<?php

namespace App\Repository\Univertuel\Prophecy\Game\Item;

use App\Entity\Univertuel\Prophecy\Game\Item\CombatWeapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CombatWeapon|null find($id, $lockMode = null, $lockVersion = null)
 * @method CombatWeapon|null findOneBy(array $criteria, array $orderBy = null)
 * @method CombatWeapon[]    findAll()
 * @method CombatWeapon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CombatWeaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CombatWeapon::class);
    }

    // /**
    //  * @return CombatWeapon[] Returns an array of CombatWeapon objects
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
    public function findOneBySomeField($value): ?CombatWeapon
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
