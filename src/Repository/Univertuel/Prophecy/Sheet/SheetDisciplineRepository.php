<?php

namespace App\Repository\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetDiscipline;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SheetDiscipline|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetDiscipline|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetDiscipline[]    findAll()
 * @method SheetDiscipline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetDisciplineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetDiscipline::class);
    }

    // /**
    //  * @return SheetDiscipline[] Returns an array of SheetDiscipline objects
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
    public function findOneBySomeField($value): ?SheetDiscipline
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
