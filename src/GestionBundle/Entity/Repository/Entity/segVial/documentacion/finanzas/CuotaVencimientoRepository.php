<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion\finanzas;

use GestionBundle\Entity\segVial\documentacion\finanzas\CuotaVencimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CuotaVencimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuotaVencimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuotaVencimiento[]    findAll()
 * @method CuotaVencimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuotaVencimientoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuotaVencimiento::class);
    }

    // /**
    //  * @return CuotaVencimiento[] Returns an array of CuotaVencimiento objects
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
    public function findOneBySomeField($value): ?CuotaVencimiento
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
