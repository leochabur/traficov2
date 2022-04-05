<?php

namespace GestionBundle\Entity\segVial\documentacion\habilitaciones;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\Unidad;

/**
 * @ORM\Table(name="gest_docum_habilitaciones_nacional")
 * @ORM\Entity
 */

abstract class HabilitacionNacional extends Habilitacion
{

    public function __construct()
    {
          parent::__construct();

    }

}
