<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion;

use GestionBundle\Entity\segVial\documentacion\Seguro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class VerificacionTecnicaRepository extends \Doctrine\ORM\EntityRepository
{

    public function getAllVTVActivas()
    {
        $qb = $this->createQueryBuilder('v')
                    ->where('v.activo = TRUE');
        $query = $qb->getQuery();
        return $query->execute();
    }

}
