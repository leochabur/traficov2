<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion\vencimientos;

use GestionBundle\Entity\segVial\documentacion\vencimientos\TurismoNacional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TurismoNacional|null find($id, $lockMode = null, $lockVersion = null)
 * @method TurismoNacional|null findOneBy(array $criteria, array $orderBy = null)
 * @method TurismoNacional[]    findAll()
 * @method TurismoNacional[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TurismoNacionalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TurismoNacional::class);
    }

    // /**
    //  * @return TurismoNacional[] Returns an array of TurismoNacional objects
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
    public function findOneBySomeField($value): ?TurismoNacional
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
