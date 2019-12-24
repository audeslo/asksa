<?php

namespace App\Repository;

use App\Entity\Venteshowroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

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
    public function findLastId()
    {
        try {
            return $this->createQueryBuilder('bl')
                ->select('bl.id')
                ->orderBy('bl.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }
    public function findLastObjet()
    {
        try {
            return $this->createQueryBuilder('bl')
                ->orderBy('bl.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult();
        } catch (NonUniqueResultException $e) {
        }
    }

    public function updateLastReferent($id,$value)
    {
        return $this->createQueryBuilder('bl')
            ->update()
            ->set('bl.reference','?1')
            ->andWhere('bl.id= :val')
            ->setParameter(1, $value)
            ->setParameter('val', $id)
            ->getQuery()
            ->execute()
            ;
    }

    public function findStockAvailableByUser($user)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $user)
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
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
