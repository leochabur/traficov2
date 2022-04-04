<?php

namespace GestionBundle\Entity\segVial\documentacion;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * TipoVencimiento
 *
 * @ORM\Table(name="seg_vial_opciones_tipo_vencimiento")
 * @ORM\Entity()
 */
class TipoVencimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** 
     * @ORM\Column() 
     * */
    private $tipo;

    /** 
     * @ORM\Column(type="boolean") 
     * */
    private $seguro = false;

    /** 
     * @ORM\Column(type="boolean") 
     * */
    private $vtvNacion = false;

    /** 
     * @ORM\Column(type="boolean") 
     * */
    private $vtvProvincia = false;

    public function __toString()
    {
        return strtoupper($this->tipo);
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

    public function getSeguro(): ?bool
    {
        return $this->seguro;
    }

    public function setSeguro(bool $seguro): self
    {
        $this->seguro = $seguro;

        return $this;
    }

    public function getVtvNacion(): ?bool
    {
        return $this->vtvNacion;
    }

    public function setVtvNacion(bool $vtvNacion): self
    {
        $this->vtvNacion = $vtvNacion;

        return $this;
    }

    public function getVtvProvincia(): ?bool
    {
        return $this->vtvProvincia;
    }

    public function setVtvProvincia(bool $vtvProvincia): self
    {
        $this->vtvProvincia = $vtvProvincia;

        return $this;
    }
}
