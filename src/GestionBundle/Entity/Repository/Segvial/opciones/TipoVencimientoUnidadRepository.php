<?php

namespace GestionBundle\Entity\Repository\SegVial\opciones;

use GestionBundle\Entity\Entity\SegVial\opciones\TipoVencimientoUnidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoVencimientoUnidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoVencimientoUnidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoVencimientoUnidad[]    findAll()
 * @method TipoVencimientoUnidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoVencimientoUnidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoVencimientoUnidad::class);
    }

    // /**
    //  * @return TipoVencimientoUnidad[] Returns an array of TipoVencimientoUnidad objects
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

    /*
    public function findOneBySomeField($value): ?TipoVencimientoUnidad
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
