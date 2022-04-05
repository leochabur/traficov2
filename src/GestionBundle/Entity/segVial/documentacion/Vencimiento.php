<?php

namespace GestionBundle\Entity\segVial\documentacion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use GestionBundle\Entity\Repository\Entity\segVial\documentacion\VencimientoRepository;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\documentacion\finanzas\CuotaVencimiento;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Table(name="gest_docum_vencimientos")
 * @ORM\Entity(repositoryClass=VencimientoRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="vtoType", type="integer")
 * @ORM\DiscriminatorMap({1:"Vencimiento", 2: "VencimientoUnidad", 3:"Seguro", 4: "VerificacionTecnica", 5: "VerificacionTecnicaNacional", 6: "VerificacionTecnicaProvincial", 7:"GestionBundle\Entity\segVial\documentacion\habilitaciones\Habilitacion", 8:"GestionBundle\Entity\segVial\documentacion\habilitaciones\HabilitacionNacional", 9:"GestionBundle\Entity\segVial\documentacion\habilitaciones\TurismoNacional",10:"GestionBundle\Entity\segVial\documentacion\habilitaciones\OfertaLibre", 11:"GestionBundle\Entity\segVial\documentacion\habilitaciones\Charter", 12:"GestionBundle\Entity\segVial\documentacion\habilitaciones\Contratado", 13:"GestionBundle\Entity\segVial\documentacion\habilitaciones\HabilitacionProvincial", 14:"GestionBundle\Entity\segVial\documentacion\habilitaciones\TurismoProvincial"})
 */

abstract class Vencimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** 
     * @ORM\Column(type="date") 
     * @Assert\NotNull(message="El campo emision no puede permanecer en blanco", groups={"general", "tecnical"})
     * */
    private $emision;

    /** 
     * @ORM\Column(type="date") 
     * @Assert\NotNull(message="El campo vigencia hasta no puede permanecer en blanco", groups={"general", "tecnical"})
     * */
    private $vigenciaDesde;

    /** 
     * @ORM\Column(type="date") 
     * @Assert\NotNull(message="El campo vigencia desde no puede permanecer en blanco", groups={"general", "tecnical"})
     * */
    private $vigenciaHasta;

    /**
     * @ORM\ManyToOne(targetEntity="Vencimiento")
     * @ORM\JoinColumn(name="id_reueva_vto", referencedColumnName="id", nullable=true)
     */
    private $renuevaVencimiento;

    /**
     * @ORM\ManyToOne(targetEntity="ProveedorExterno")
     * @ORM\JoinColumn(name="id_prveedor", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo proveedor no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $proveedor;

    /**
     * @ORM\ManyToOne(targetEntity="TipoVencimiento")
     * @ORM\JoinColumn(name="id_tpo_vto", referencedColumnName="id", nullable=true)
    */
    private $tipoVencimiento;

    /** 
     * @ORM\Column(type="boolean") 
     * */
    private $activo = true;

    /** 
     * @ORM\Column(type="integer") 
     * */
    private $cantCuotas = 1;

    /**
     * @ORM\OneToMany(targetEntity="GestionBundle\Entity\segVial\documentacion\finanzas\CuotaVencimiento", mappedBy="vencimiento", cascade={"persist", "remove"})
     */
    private $cuotasVencimientos;


    public abstract function getType();

    public abstract function getTexto();

    public function __construct()
    {
        $this->cuotasVencimientos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmision(): ?\DateTimeInterface
    {
        return $this->emision;
    }

    public function setEmision(?\DateTimeInterface $emision): self
    {
        $this->emision = $emision;

        return $this;
    }

    public function getVigenciaDesde(): ?\DateTimeInterface
    {
        return $this->vigenciaDesde;
    }

    public function setVigenciaDesde(?\DateTimeInterface $vigenciaDesde): self
    {
        $this->vigenciaDesde = $vigenciaDesde;

        return $this;
    }

    public function getVigenciaHasta(): ?\DateTimeInterface
    {
        return $this->vigenciaHasta;
    }

    public function setVigenciaHasta(?\DateTimeInterface $vigenciaHasta): self
    {
        $this->vigenciaHasta = $vigenciaHasta;

        return $this;
    }

    public function getProveedor(): ?ProveedorExterno
    {
        return $this->proveedor;
    }

    public function setProveedor(?ProveedorExterno $proveedor): self
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    public function getRenuevaVencimiento(): ?self
    {
        return $this->renuevaVencimiento;
    }

    public function setRenuevaVencimiento(?self $renuevaVencimiento): self
    {
        $this->renuevaVencimiento = $renuevaVencimiento;

        return $this;
    }

    public function getCantCuotas(): ?int
    {
        return $this->cantCuotas;
    }

    public function setCantCuotas(int $cantCuotas): self
    {
        $this->cantCuotas = $cantCuotas;

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

    public function getTipoVencimiento(): ?TipoVencimiento
    {
        return $this->tipoVencimiento;
    }

    public function setTipoVencimiento(?TipoVencimiento $tipoVencimiento): self
    {
        $this->tipoVencimiento = $tipoVencimiento;

        return $this;
    }

    /**
     * @return Collection|CuotaVencimiento[]
     */
    public function getCuotasVencimientos(): Collection
    {
        return $this->cuotasVencimientos;
    }

    public function addCuotasVencimiento(CuotaVencimiento $cuotasVencimiento): self
    {
        if (!$this->cuotasVencimientos->contains($cuotasVencimiento)) {
            $this->cuotasVencimientos[] = $cuotasVencimiento;
            $cuotasVencimiento->setVencimiento($this);
        }

        return $this;
    }

    public function removeCuotasVencimiento(CuotaVencimiento $cuotasVencimiento): self
    {
        if ($this->cuotasVencimientos->removeElement($cuotasVencimiento)) {
            // set the owning side to null (unless already changed)
            if ($cuotasVencimiento->getVencimiento() === $this) {
                $cuotasVencimiento->setVencimiento(null);
            }
        }

        return $this;
    }



}
