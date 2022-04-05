<?php

namespace GestionBundle\Entity\Repository\Entity\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\habilitaciones\TurismoNacional;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class HabilitacionRepository extends \Doctrine\ORM\EntityRepository
{

    public function getAllHabilitacionesActivas()
    {
        $qb = $this->createQueryBuilder('s')
                    ->where('s.activo = TRUE');

        $query = $qb->getQuery();

        return $query->execute();
    }

}
