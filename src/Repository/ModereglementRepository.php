<?php

namespace App\Repository;

use App\Entity\Modereglement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Modereglement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modereglement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modereglement[]    findAll()
 * @method Modereglement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModereglementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modereglement::class);
    }

    // /**
    //  * @return Modereglement[] Returns an array of Modereglement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Modereglement
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
