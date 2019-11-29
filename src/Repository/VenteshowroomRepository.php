<?php

namespace App\Repository;

use App\Entity\Venteshowroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Venteshowroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Venteshowroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Venteshowroom[]    findAll()
 * @method Venteshowroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenteshowroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Venteshowroom::class);
    }

    // /**
    //  * @return Venteshowroom[] Returns an array of Venteshowroom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Venteshowroom
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
