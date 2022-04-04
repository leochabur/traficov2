<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion;

use GestionBundle\Entity\segVial\documentacion\ProveedorExterno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProveedorExterno|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProveedorExterno|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProveedorExterno[]    findAll()
 * @method ProveedorExterno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProveedorExternoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProveedorExterno::class);
    }

    // /**
    //  * @return ProveedorExterno[] Returns an array of ProveedorExterno objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProveedorExterno
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
