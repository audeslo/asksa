<?php

namespace App\Repository;

use App\Entity\Commander;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

/**
 * @method Commander|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commander|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commander[]    findAll()
 * @method Commander[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommanderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commander::class);
    }


    /**
     * @param $produit
     * @param $carton
     * @param $bidon
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     */
    public function findQuantityInStock($produit, $carton, $bidon)
    {
        try {
            return $this->createQueryBuilder('c')
                ->select('SUM(c.quantiteenstock) AS quantite')
                ->join('c.commande','cm')
                ->Where('c.produit =?1')
                ->andWhere('c.capacitebidon =?2')
                ->andWhere('c.capacitecarton =?3')
                ->andWhere('cm.etat =?4')
                ->setParameter(1, $produit)
                ->setParameter(2, $bidon)
                ->setParameter(3, $carton)
                ->setParameter(4, 2)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }


    public function findListCommanderDispo($produit, $carton, $bidon)
    {
        return $this->createQueryBuilder('c')
            ->join('c.commande','cm')
            ->Where('c.produit =?1')
            ->andWhere('c.capacitebidon =?2')
            ->andWhere('c.capacitecarton =?3')
            ->andWhere('c.quantiteenstock >?4')
            ->andWhere('cm.etat =?5')
            ->setParameter(1, $produit)
            ->setParameter(2, $bidon)
            ->setParameter(3, $carton)
            ->setParameter(4, 0)
            ->setParameter(5, 2)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findProduitIdentic()
    {
        return $this->createQueryBuilder('c')
            ->innerJoin('c.produit', 'p')
            ->select('p.designation as designation, c.capacitebidon as capacitebidon, c.capacitecarton as capacitecarton, SUM(c.quantiteenstock) as stock')
            ->groupBy('c.produit', 'c.capacitebidon', 'c.capacitecarton')
            ->getQuery()
            ->getResult()
            ;
    }

    public function UpdateCommander($commander, $valeur)
    {
        return $this->createQueryBuilder('c')
            ->update()
            ->set('c.quantiteenstock','?1')
            ->andWhere('c.id =?2')
            ->setParameter(1, $valeur)
            ->setParameter(2, $commander)
            ->getQuery()
            ->getResult()
            ;
    }




    // /**
    //  * @return Commander[] Returns an array of Commander objects
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
    public function findOneBySomeField($value): ?Commander
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
