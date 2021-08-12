<?php

namespace GestionBundle\Entity\Repository\Entity\opciones;

use GestionBundle\Entity\opciones\TipoVencimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoVencimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoVencimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoVencimiento[]    findAll()
 * @method TipoVencimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoVencimientoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoVencimiento::class);
    }

    // /**
    //  * @return TipoVencimiento[] Returns an array of TipoVencimiento objects
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
    public function findOneBySomeField($value): ?TipoVencimiento
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
