<?php

namespace App\Repository\Univertuel\Prophecy\Sheet;

use App\Entity\Univertuel\Prophecy\Sheet\SheetSkills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SheetSkills|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetSkills|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetSkills[]    findAll()
 * @method SheetSkills[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetSkillsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetSkills::class);
    }

    // /**
    //  * @return SheetSkills[] Returns an array of SheetSkills objects
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
    public function findOneBySomeField($value): ?SheetSkills
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
