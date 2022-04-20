<?php

namespace GestionBundle\Entity\segVial\opciones;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="seg_vial_opciones_ubicacion_motor_unidad")
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"ubicacion"},
 *     errorPath="ubicacion",
 *     message="Ubicacion de motor existente en la Base de Datos",
 *     groups={"general", "tecnical"}
 * )
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
     * @Assert\NotNull(message="El campo ubicacion no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $ubicacion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo = true;

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
