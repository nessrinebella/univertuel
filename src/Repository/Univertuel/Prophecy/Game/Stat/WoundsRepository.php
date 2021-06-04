<?php

namespace App\Repository\Univertuel\Prophecy\Game\Stat;

use App\Entity\Univertuel\Prophecy\Game\Stat\Wounds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Wounds|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wounds|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wounds[]    findAll()
 * @method Wounds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WoundsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wounds::class);
    }

    // /**
    //  * @return Wounds[] Returns an array of Wounds objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wounds
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
