<?php

namespace GestionBundle\Entity\segVial\documentacion\finanzas;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use GestionBundle\Entity\Repository\Entity\segVial\documentacion\finanzas\CuotaVencimientoRepository;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\documentacion\Vencimiento;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gest_docum_pagos_cuota_vencimiento")
 * @ORM\Entity(repositoryClass=CuotaVencimientoRepository::class)
 */
class CuotaVencimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\NotNull(message="El campo fecha vencimiento no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $fechaVencimiento;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\NotNull(message="El campo fecha pago no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $fechaPago;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Type(        
     *     type="float",
     *     message="El importe debe ser numerico",
     *     groups={"general"}
     * )
     */
    private $monto;

    /**
     * @ORM\OneToMany(targetEntity="CuotaUnidad", mappedBy="cuotaVencimiento", cascade={"persist", "remove"})
     */
    private $cuotasUnidades;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\documentacion\Vencimiento", inversedBy="cuotasVencimientos")
     * @ORM\JoinColumn(name="id_vto", referencedColumnName="id")
     */
    private $vencimiento;

    public function __construct()
    {
        $this->cuotasUnidades = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaVencimiento(): ?\DateTimeInterface
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(?\DateTimeInterface $fechaVencimiento): self
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    public function getFechaPago(): ?\DateTimeInterface
    {
        return $this->fechaPago;
    }

    public function setFechaPago(?\DateTimeInterface $fechaPago): self
    {
        $this->fechaPago = $fechaPago;

        return $this;
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

    /**
     * @return Collection|CuotaUnidad[]
     */
    public function getCuotasUnidades(): Collection
    {
        return $this->cuotasUnidades;
    }

    public function addCuotasUnidade(CuotaUnidad $cuotasUnidade): self
    {
        if (!$this->cuotasUnidades->contains($cuotasUnidade)) {
            $this->cuotasUnidades[] = $cuotasUnidade;
            $cuotasUnidade->setCuotaVencimiento($this);
        }

        return $this;
    }

    public function removeCuotasUnidade(CuotaUnidad $cuotasUnidade): self
    {
        if ($this->cuotasUnidades->removeElement($cuotasUnidade)) {
            // set the owning side to null (unless already changed)
            if ($cuotasUnidade->getCuotaVencimiento() === $this) {
                $cuotasUnidade->setCuotaVencimiento(null);
            }
        }

        return $this;
    }

    public function getVencimiento(): ?Vencimiento
    {
        return $this->vencimiento;
    }

    public function setVencimiento(?Vencimiento $vencimiento): self
    {
        $this->vencimiento = $vencimiento;

        return $this;
    }
}
