<?php

namespace GestionBundle\Entity\Repository\GestionBundle\Entity\segVial\opciones;

use GestionBundle\Entity\Entity\GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoHabilitacionUnidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoHabilitacionUnidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoHabilitacionUnidad[]    findAll()
 * @method TipoHabilitacionUnidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoHabilitacionUnidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoHabilitacionUnidad::class);
    }

    // /**
    //  * @return TipoHabilitacionUnidad[] Returns an array of TipoHabilitacionUnidad objects
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
    public function findOneBySomeField($value): ?TipoHabilitacionUnidad
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
