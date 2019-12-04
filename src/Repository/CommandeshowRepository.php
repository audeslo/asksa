<?php

namespace App\Repository;

use App\Entity\Commandeshow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

/**
 * @method Commandeshow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commandeshow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commandeshow[]    findAll()
 * @method Commandeshow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeshowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commandeshow::class);
    }

    /**
     * @return mixed
     */
    public function findLastId()
    {
        try {
            return $this->createQueryBuilder('cs')
                ->select('cs.id')
                ->orderBy('cs.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }

    /**
     * @param $id
     * @param $value
     * @return mixed
     */
    public function updateLastReferent($id, $value)
    {
        return $this->createQueryBuilder('cs')
            ->update()
            ->set('cs.reference','?1')
            ->andWhere('cs.id = :val')
            ->setParameter(1, $value)
            ->setParameter('val', $id)
            ->getQuery()
            ->execute()
            ;
    }


    public function findAllProducts($value)
    {
        return $this->createQueryBuilder('c')
            ->join('c.commandershow','cshow')
            ->join('cshow.produit','p')
            ->andWhere('c.id = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function updateCommandeshow($id)
    {
        return $this->createQueryBuilder('c')
            ->update()
            ->set('c.statut','?1')
            ->andWhere('c.id =?2')
            ->setParameter(1, 1)
            ->setParameter(2, $id)
            ->getQuery()
            ->execute()
            ;
    }
    // Nouvelle requete pour les showrooms
    public function findCommanderByShowroom($showroom)
    {
        return $this->createQueryBuilder('c')
            ->innerJoin('c.commandershow', 'r')
            ->innerJoin('r.produit','p')
            ->innerJoin('c.showroom','s')
            ->select('p.designation as designation, r.capacitebidonshow as capacitebidon, r.capacitecartonshow as capacitecarton, SUM(r.quantitestock) as stock')
            ->where('s.id = :showroom')
            ->setParameter('showroom', $showroom)
            ->groupBy('r.produit', 'r.capacitebidonshow', 'r.capacitecartonshow')
            ->getQuery()
            ->getResult()
            ;
    }
    // /**
    //  * @return Commandeshow[] Returns an array of Commandeshow objects
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
    public function findOneBySomeField($value): ?Commandeshow
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
