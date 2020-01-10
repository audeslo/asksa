<?php

namespace App\Repository;

use App\Entity\Tarifcategorieclt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

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

    public function findPrice($categorie,$produit,$capacite,$qte)
    {
        try {
            return $this->createQueryBuilder('t')
                ->select('t.montant as Montant')
                ->andWhere('t.categorie = ?1')
                ->andWhere('t.produit = ?2')
                ->andWhere('t.capacite = ?3')
                ->andWhere(':val BETWEEN t.borneinferieure AND t.bornesupperieur')
                ->setParameter('val', $qte)
                ->setParameter(1, $categorie)
                ->setParameter(2, $produit)
                ->setParameter(3, $capacite)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
    }


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
