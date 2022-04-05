<?php

namespace GestionBundle\Entity\segVial\documentacion\opciones;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * TipoHabilitacionProvincia
 *
 * @ORM\Table(name="seg_vial_opciones_tipo_habilitaciones_provincia")
 * @ORM\Entity()
 */
class TipoHabilitacionProvincia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipo;


    public function __toString()
    {
        return strtoupper($this->tipo);
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
