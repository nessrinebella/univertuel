<?php

namespace App\Repository\Univertuel\Prophecy\Game\Item;

use App\Entity\Univertuel\Prophecy\Game\Item\ArmorCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArmorCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArmorCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArmorCategory[]    findAll()
 * @method ArmorCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmorCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArmorCategory::class);
    }

    // /**
    //  * @return ArmorCategory[] Returns an array of ArmorCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArmorCategory
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
