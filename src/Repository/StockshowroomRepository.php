<?php

namespace App\Repository;

use App\Entity\Stockshowroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Stockshowroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stockshowroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stockshowroom[]    findAll()
 * @method Stockshowroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockshowroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stockshowroom::class);
    }

    public function findReference($idcommande)
    {
        return $this->createQueryBuilder('s')
            ->join('s.Commandershow','cs')
            ->where('cs.commandeshow = ?1')
            ->setParameter(1, $idcommande)
            ->orderBy('s.referencecarton', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Stockshowroom[] Returns an array of Stockshowroom objects
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
    public function findOneBySomeField($value): ?Stockshowroom
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
