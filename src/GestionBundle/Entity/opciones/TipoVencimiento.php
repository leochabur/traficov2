<?php

namespace GestionBundle\Entity\opciones;

use GestionBundle\Entity\Repository\Entity\opciones\TipoVencimientoRepository;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoVencimientoRepository::class)
 * @ORM\Table(name="seg_vial_opciones_tipo_vto_abstract")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="tpotype", type="integer")
 * @ORM\DiscriminatorMap({1:"TipoVencimiento", 2: "GestionBundle\Entity\rrhh\TipoVencimientoPersonal", 3: "TipoVencimientoUnidad", 4:"TipoVencimientoDocumentoAdjunto"})
 */

abstract class TipoVencimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $tipo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo = true;
    
    public function __toString()
    {
        return $this->tipo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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
