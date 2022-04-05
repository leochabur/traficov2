<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\habilitaciones\OfertaLibre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfertaLibre|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfertaLibre|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfertaLibre[]    findAll()
 * @method OfertaLibre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfertaLibreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfertaLibre::class);
    }

    // /**
    //  * @return OfertaLibre[] Returns an array of OfertaLibre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfertaLibre
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
