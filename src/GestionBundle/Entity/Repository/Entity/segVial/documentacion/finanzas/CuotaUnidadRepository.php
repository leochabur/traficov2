<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion\finanzas;

use GestionBundle\Entity\segVial\documentacion\finanzas\CuotaUnidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CuotaUnidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuotaUnidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuotaUnidad[]    findAll()
 * @method CuotaUnidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuotaUnidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuotaUnidad::class);
    }

    // /**
    //  * @return CuotaUnidad[] Returns an array of CuotaUnidad objects
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
    public function findOneBySomeField($value): ?CuotaUnidad
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
