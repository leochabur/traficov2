<?php

namespace GestionBundle\Repository\segVial\opciones;

/**
 * TipoUnidadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TipoUnidadRepository extends \Doctrine\ORM\EntityRepository
{
    public function getTiposUnidades()
    {
        $data =  $this->createQueryBuilder('u')
                        ->getQuery()
                        ->getResult();
        return $data;
    }
}
