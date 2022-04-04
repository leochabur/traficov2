<?php

namespace GestionBundle\Entity\segVial\documentacion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\Unidad;

/**
 * @ORM\Table(name="gest_docum_habilitaciones)
 * @ORM\Entity
 */

abstract class Habilitacion extends Vencimiento
{

    /** 
     * @ORM\Column
     * 
     */
    private $numero;

    public function __construct()
    {
          parent::__construct();

    }


}
