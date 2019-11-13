<?php

namespace App\Repository;

use App\Entity\Tarifcategorieclt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Tarifcategorieclt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tarifcategorieclt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tarifcategorieclt[]    findAll()
 * @method Tarifcategorieclt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifcategoriecltRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tarifcategorieclt::class);
    }

    // /**
    //  * @return Tarifcategorieclt[] Returns an array of Tarifcategorieclt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tarifcategorieclt
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
