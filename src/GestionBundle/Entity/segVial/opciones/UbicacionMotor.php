<?php

namespace GestionBundle\Entity\segVial\opciones;

use GestionBundle\Entity\Repository\segVial\opciones\UbicacionMotorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="seg_vial_opciones_ubicacion_motor_unidad")
 * @ORM\Entity(repositoryClass="GestionBundle\Entity\Repository\segVial\opciones\UbicacionMotorRepository")
 */
class UbicacionMotor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ubicacion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    public function __toString()
    {
        return $this->ubicacion;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }
}
