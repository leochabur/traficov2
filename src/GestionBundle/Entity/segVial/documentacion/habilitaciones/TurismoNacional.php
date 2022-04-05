<?php

namespace GestionBundle\Entity\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\Repository\Entity\segVial\documentacion\habilitaciones\TurismoNacionalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gest_docum_habilitaciones_turismo_nacional")
 * @ORM\Entity(repositoryClass=TurismoNacionalRepository::class)
 */
class TurismoNacional extends HabilitacionNacional
{

    public function __toString()
    {
        return 'Turismo Nacional - '.$this->getCodigoHabilitacion();
    }

    public  function getType()
    {
        return 9;
    }

    public function getTexto()
    {
        return "Habilitacion Turismo Nacional";
    }

}
