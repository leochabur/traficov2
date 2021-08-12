<?php

namespace GestionBundle\Entity\Repository\Segvial\opciones;

use GestionBundle\Entity\Entity\Segvial\opciones\TipoHabilitacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoHabilitacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoHabilitacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoHabilitacion[]    findAll()
 * @method TipoHabilitacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoHabilitacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoHabilitacion::class);
    }

    // /**
    //  * @return TipoHabilitacion[] Returns an array of TipoHabilitacion objects
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
    public function findOneBySomeField($value): ?TipoHabilitacion
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
