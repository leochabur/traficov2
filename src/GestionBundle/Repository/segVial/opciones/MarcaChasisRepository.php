<?php

namespace GestionBundle\Repository\segVial\opciones;

/**
 * MarcaChasisRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MarcaChasisRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllMarcas()
    {
        $data =  $this->createQueryBuilder('u')
                        ->orderBy('u.marca')
                        ->getQuery()
                        ->getResult();
        return $data;
    }
}
