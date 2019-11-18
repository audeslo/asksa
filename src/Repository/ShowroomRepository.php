<?php

namespace App\Repository;

use App\Entity\Showroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

/**
 * @method Showroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Showroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Showroom[]    findAll()
 * @method Showroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShowroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Showroom::class);
    }


    public function findLastId()
    {
        try {
            return $this->createQueryBuilder('s')
                ->select('s.id')
                ->orderBy('s.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }

    public function updateLastReferent($id,$value)
    {
        return $this->createQueryBuilder('s')
            ->update()
            ->set('s.code','?1')
            ->andWhere('s.id= :val')
            ->setParameter(1, $value)
            ->setParameter('val', $id)
            ->getQuery()
            ->execute()
            ;
    }

    // /**
    //  * @return Showroom[] Returns an array of Showroom objects
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
    public function findOneBySomeField($value): ?Showroom
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
