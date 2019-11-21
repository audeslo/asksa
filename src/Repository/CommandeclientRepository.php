<?php

namespace App\Repository;

use App\Entity\Commandeclient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Commandeclient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commandeclient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commandeclient[]    findAll()
 * @method Commandeclient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeclientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commandeclient::class);
    }

    // /**
    //  * @return Commandeclient[] Returns an array of Commandeclient objects
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
    public function findOneBySomeField($value): ?Commandeclient
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
