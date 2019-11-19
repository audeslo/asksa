<?php

namespace App\Repository;

use App\Entity\Commandershow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Commandershow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commandershow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commandershow[]    findAll()
 * @method Commandershow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandershowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commandershow::class);
    }

    // /**
    //  * @return Commandershow[] Returns an array of Commandershow objects
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
    public function findOneBySomeField($value): ?Commandershow
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
