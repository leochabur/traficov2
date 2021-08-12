<?php

namespace GestionBundle\Entity\segVial\opciones;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use GestionBundle\Entity\opciones\TipoVencimiento;

/**
 * TipoHabilitacionUnidad
 *
 * @ORM\Table(name="seg_vial_opciones_tipo_hab_unidad")
 * @ORM\Entity()
 */
class TipoHabilitacionUnidad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
}
