<?php

namespace App\Repository;

use App\Entity\VenteStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

/**
 * @method VenteStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method VenteStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method VenteStock[]    findAll()
 * @method VenteStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenteStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VenteStock::class);
    }


    /**
     * @return mixed
     */
    public function findLastVente()
    {
        try {
            return $this->createQueryBuilder('v')
                ->orderBy('v.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
    }




    // /**
    //  * @return VenteStock[] Returns an array of VenteStock objects
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
    public function findOneBySomeField($value): ?VenteStock
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
