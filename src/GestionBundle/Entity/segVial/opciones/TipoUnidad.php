<?php

namespace GestionBundle\Entity\segVial\opciones;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * TipoUnidad
 *
 * @ORM\Table(name="seg_vial_opciones_tipo_unidad")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\opciones\TipoUnidadRepository")
 * @UniqueEntity(
 *     fields={"tipo"},
 *     errorPath="tipo",
 *     message="Tipo de unidad existente en la Base de Datos",
 *     groups={"general", "tecnical"}
 * )
 */
class TipoUnidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, unique=true)
     * @Assert\NotNull(message="El campo tipo no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $tipo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo = true;
    
    public function __toString()
    {
        return strtoupper($this->tipo);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TipoUnidad
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
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
