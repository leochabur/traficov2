<?php

namespace GestionBundle\Entity\segVial\documentacion\finanzas;

use GestionBundle\Entity\Repository\Entity\segVial\documentacion\finanzas\CuotaUnidadRepository;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\Unidad;

/**
 * @ORM\Table(name="gest_docum_pagos_cuota_unidad")
 * @ORM\Entity(repositoryClass=CuotaUnidadRepository::class)
 */
class CuotaUnidad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $monto;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\Unidad")
     * @ORM\JoinColumn(name="id_unidad", referencedColumnName="id")
     */
    private $unidad;

    /**
     * @ORM\ManyToOne(targetEntity="CuotaVencimiento", inversedBy="cuotasUnidades")
     * @ORM\JoinColumn(name="id_cuota_vto", referencedColumnName="id")
     */
    private $cuotaVencimiento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonto(): ?float
    {
        return $this->monto;
    }

    public function setMonto(float $monto): self
    {
        $this->monto = $monto;

        return $this;
    }

    public function getUnidad(): ?Unidad
    {
        return $this->unidad;
    }

    public function setUnidad(?Unidad $unidad): self
    {
        $this->unidad = $unidad;

        return $this;
    }

    public function getCuotaVencimiento(): ?CuotaVencimiento
    {
        return $this->cuotaVencimiento;
    }

    public function setCuotaVencimiento(?CuotaVencimiento $cuotaVencimiento): self
    {
        $this->cuotaVencimiento = $cuotaVencimiento;

        return $this;
    }
}
