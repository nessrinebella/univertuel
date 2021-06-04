<?php
 
namespace App\Repository\Univertuel\Prophecy\Sheet;
 
use App\Entity\Univertuel\Prophecy\Sheet\SheetWounds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
 
/**
 * @method SheetWounds|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetWounds|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetWounds[]    findAll()
 * @method SheetWounds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetWoundsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetWounds::class);
    }

    // /**
    //  * @return SheetWounds[] Returns an array of SheetWounds objects
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
    public function findOneBySomeField($value): ?SheetWounds
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
