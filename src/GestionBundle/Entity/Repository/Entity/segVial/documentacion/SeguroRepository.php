<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion;

use GestionBundle\Entity\segVial\documentacion\Seguro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SeguroRepository extends \Doctrine\ORM\EntityRepository
{

    public function getAllSegurosActivos()
    {
        $qb = $this->createQueryBuilder('s')
                    ->where('s.activo = TRUE');


        $query = $qb->getQuery();

        return $query->execute();
    }

}
