<?php

namespace GestionBundle\Entity\ventas;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Cliente
 *
 * @ORM\Table(name="ventas_clientes")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\ventas\ClienteRepository")
 * @UniqueEntity("prefijo", message="Prefijo existente")
 * @UniqueEntity("cuit", message="CUIT existente", groups={"financial"})
 */
class Cliente
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
     * @ORM\Column(name="prefijo", type="string", length=3, unique=true)
     * @Assert\NotNull(message="El campo Prefijo no puede permanecer en blanco", groups={"general","financial"})
     */
    private $prefijo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreFantasia", type="string", length=255)
     * @Assert\NotNull(message="El campo Nombre de Fantasia no puede permanecer en blanco", groups={"general","financial"})
     */
    private $nombreFantasia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="razonSocial", type="string", length=255)
     * @Assert\NotNull(message="El campo Razon Social no puede permanecer en blanco", groups={"general", "financial"})
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=13, unique=true)
     * @Assert\NotNull(message="El campo CUIT no puede permanecer en blanco", groups={"financial"})
     */
    private $cuit;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilioFiscal", type="string", length=255)
     * @Assert\NotNull(message="El campo Domicilio Fiscal no puede permanecer en blanco", groups={"financial"})
     */
    private $domicilioFiscal;

    /** 
    * @ORM\Column(type="string", columnDefinition="ENUM('INSC', 'NOINSC', 'MONO', 'EXC')") 
    * @Assert\NotNull(message="El campo Responsabilidad IVA no puede permanecer en blanco", groups={"financial"})
    */
    private $responsabilidad;

    /**
     * @ORM\Column(name="condicionPago", type="integer")
     * @Assert\NotNull(message="El campo Condicion de Pago no puede permanecer en blanco", groups={"financial"})
     */
    private $condicionPago;

    /** 
    * @ORM\Column(name="tipo_factura", type="string", columnDefinition="ENUM('A', 'B', 'C', 'M')") 
    * @Assert\NotNull(message="El campo Tipo Factura no puede permanecer en blanco", groups={"financial"})
    */
    private $tipoFactura;

    /** 
    * @ORM\Column(type="string", columnDefinition="ENUM('POL', 'APC', 'FADEEAC')") 
    * @Assert\NotNull(message="El campo Tipo Ajuste no puede permanecer en blanco", groups={"financial"})
    */
    private $tipoAjuste;

    /** 
    * @ORM\Column(type="string", columnDefinition="ENUM('CUAT', 'SEM', 'AN', 'LIB')") 
    * @Assert\NotNull(message="El campo Frecuencia de Ajuste no puede permanecer en blanco", groups={"financial"})
    */
    private $frecuencaAjuste;

    /**
     * @ORM\Column(name="nombreContacto", type="string", length=255, nullable=true)
     */
    private $nombreContacto;

    /**
     * @ORM\Column(name="telefonoContacto", type="string", length=255, nullable=true)
     */
    private $telefonoContacto;

    /**
     * @ORM\Column(name="celularContacto", type="string", length=255, nullable=true)
     */
    private $celularContacto;

    /**
     * @ORM\Column(name="mailContacto", type="string", length=255, nullable=true)
     * @Assert\Email(
     *     message = "El correo electronico es invalido",
     *     checkMX = true
     * )
     */
    private $mailContacto;

    /**
     * @ORM\Column(name="cargoContacto", type="string", length=255, nullable=true)
     */
    private $cargoContacto;


    /**
     * @ORM\OneToMany(targetEntity="UbicacionEstructuraCliente", mappedBy="cliente", cascade={"persist"})
     * @Assert\Valid()
     */
    private $ubicaciones;


    /**
     * @ORM\Column(name="activo", type="boolean", options={"default"=true})
     */
    private $activo = true;

    public function __toString()
    {
        return $this->razonSocial;
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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Cliente
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set nombreFantasia
     *
     * @param string $nombreFantasia
     *
     * @return Cliente
     */
    public function setNombreFantasia($nombreFantasia)
    {
        $this->nombreFantasia = $nombreFantasia;

        return $this;
    }

    /**
     * Get nombreFantasia
     *
     * @return string
     */
    public function getNombreFantasia()
    {
        return $this->nombreFantasia;
    }

    /**
     * Set prefijo
     *
     * @param string $prefijo
     *
     * @return Cliente
     */
    public function setPrefijo($prefijo)
    {
        $this->prefijo = $prefijo;

        return $this;
    }

    /**
     * Get prefijo
     *
     * @return string
     */
    public function getPrefijo()
    {
        return $this->prefijo;
    }

    /**
     * Set domicilioFiscal
     *
     * @param string $domicilioFiscal
     *
     * @return Cliente
     */
    public function setDomicilioFiscal($domicilioFiscal)
    {
        $this->domicilioFiscal = $domicilioFiscal;

        return $this;
    }

    /**
     * Get domicilioFiscal
     *
     * @return string
     */
    public function getDomicilioFiscal()
    {
        return $this->domicilioFiscal;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     *
     * @return Cliente
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set responsabilidad
     *
     * @param string $responsabilidad
     *
     * @return Cliente
     */
    public function setResponsabilidad($responsabilidad)
    {
        $this->responsabilidad = $responsabilidad;

        return $this;
    }

    /**
     * Get responsabilidad
     *
     * @return string
     */
    public function getResponsabilidad()
    {
        return $this->responsabilidad;
    }

    /**
     * Set condicionPago
     *
     * @param integer $condicionPago
     *
     * @return Cliente
     */
    public function setCondicionPago($condicionPago)
    {
        $this->condicionPago = $condicionPago;

        return $this;
    }

    /**
     * Get condicionPago
     *
     * @return integer
     */
    public function getCondicionPago()
    {
        return $this->condicionPago;
    }

    /**
     * Set tipoFactura
     *
     * @param string $tipoFactura
     *
     * @return Cliente
     */
    public function setTipoFactura($tipoFactura)
    {
        $this->tipoFactura = $tipoFactura;

        return $this;
    }

    /**
     * Get tipoFactura
     *
     * @return string
     */
    public function getTipoFactura()
    {
        return $this->tipoFactura;
    }

    /**
     * Set tipoAjuste
     *
     * @param string $tipoAjuste
     *
     * @return Cliente
     */
    public function setTipoAjuste($tipoAjuste)
    {
        $this->tipoAjuste = $tipoAjuste;

        return $this;
    }

    /**
     * Get tipoAjuste
     *
     * @return string
     */
    public function getTipoAjuste()
    {
        return $this->tipoAjuste;
    }

    /**
     * Set frecuencaAjuste
     *
     * @param string $frecuencaAjuste
     *
     * @return Cliente
     */
    public function setFrecuencaAjuste($frecuencaAjuste)
    {
        $this->frecuencaAjuste = $frecuencaAjuste;

        return $this;
    }

    /**
     * Get frecuencaAjuste
     *
     * @return string
     */
    public function getFrecuencaAjuste()
    {
        return $this->frecuencaAjuste;
    }

    /**
     * Set nombreContacto
     *
     * @param string $nombreContacto
     *
     * @return Cliente
     */
    public function setNombreContacto($nombreContacto)
    {
        $this->nombreContacto = $nombreContacto;

        return $this;
    }

    /**
     * Get nombreContacto
     *
     * @return string
     */
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    /**
     * Set telefonoContacto
     *
     * @param string $telefonoContacto
     *
     * @return Cliente
     */
    public function setTelefonoContacto($telefonoContacto)
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }

    /**
     * Get telefonoContacto
     *
     * @return string
     */
    public function getTelefonoContacto()
    {
        return $this->telefonoContacto;
    }

    /**
     * Set celularContacto
     *
     * @param string $celularContacto
     *
     * @return Cliente
     */
    public function setCelularContacto($celularContacto)
    {
        $this->celularContacto = $celularContacto;

        return $this;
    }

    /**
     * Get celularContacto
     *
     * @return string
     */
    public function getCelularContacto()
    {
        return $this->celularContacto;
    }

    /**
     * Set mailContacto
     *
     * @param string $mailContacto
     *
     * @return Cliente
     */
    public function setMailContacto($mailContacto)
    {
        $this->mailContacto = $mailContacto;

        return $this;
    }

    /**
     * Get mailContacto
     *
     * @return string
     */
    public function getMailContacto()
    {
        return $this->mailContacto;
    }

    /**
     * Set cargoContacto
     *
     * @param string $cargoContacto
     *
     * @return Cliente
     */
    public function setCargoContacto($cargoContacto)
    {
        $this->cargoContacto = $cargoContacto;

        return $this;
    }

    /**
     * Get cargoContacto
     *
     * @return string
     */
    public function getCargoContacto()
    {
        return $this->cargoContacto;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ubicaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ubicacione
     *
     * @param \GestionBundle\Entity\ventas\UbicacionEstructuraCliente $ubicacione
     *
     * @return Cliente
     */
    public function addUbicacione(\GestionBundle\Entity\ventas\UbicacionEstructuraCliente $ubicacione)
    {
        $ubicacione->setCliente($this);

        $this->ubicaciones[] = $ubicacione;

        return $this;
    }

    /**
     * Remove ubicacione
     *
     * @param \GestionBundle\Entity\ventas\UbicacionEstructuraCliente $ubicacione
     */
    public function removeUbicacione(\GestionBundle\Entity\ventas\UbicacionEstructuraCliente $ubicacione)
    {
        $this->ubicaciones->removeElement($ubicacione);
    }

    /**
     * Get ubicaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUbicaciones()
    {
        return $this->ubicaciones;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Cliente
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }
}
