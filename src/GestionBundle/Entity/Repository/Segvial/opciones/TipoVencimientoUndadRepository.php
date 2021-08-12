<?php

namespace GestionBundle\Entity\Repository\SegVial\opciones;

use GestionBundle\Entity\Entity\SegVial\opciones\TipoVencimientoUndad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoVencimientoUndad|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoVencimientoUndad|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoVencimientoUndad[]    findAll()
 * @method TipoVencimientoUndad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoVencimientoUndadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoVencimientoUndad::class);
    }

    // /**
    //  * @return TipoVencimientoUndad[] Returns an array of TipoVencimientoUndad objects
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
    public function findOneBySomeField($value): ?TipoVencimientoUndad
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
