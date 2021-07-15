<?php

namespace GestionBundle\Entity\segVial\eventos;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Infraccion
 *
 * @ORM\Table(name="seg_vial_eventos_infraccion")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\eventos\InfraccionRepository")
 */
class Infraccion extends Evento
{

    /**
     * @var string
     *
     * @ORM\Column(name="numeroActa", type="string", length=255)
     */
    private $numeroActa;

    /**
     * @var bool
     *
     * @ORM\Column(name="notificado", type="boolean")
     */
    private $notificado = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="descontada", type="boolean")
     */
    private $descontada = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="aceptada", type="boolean")
     */
    private $aceptada = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vencimiento", type="date")
     */
    private $vencimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaPago;

    /**
     * @var float
     *
     * @ORM\Column(name="montoInicial", type="float")
     */
    private $montoInicial;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $montoAbonado;

    /**
     * @var bool
     *
     * @ORM\Column(name="cuotas", type="integer")
     */
    private $cuotas;

    /**
     * @ORM\ManyToOne(targetEntity="TipoInfraccion")
     * @ORM\JoinColumn(name="id_tipo_infraccion", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipoInfraccion;

    public static function getPrefix() {
        return "INF";
    }


    /**
     * Set numeroActa
     *
     * @param string $numeroActa
     *
     * @return Infraccion
     */
    public function setNumeroActa($numeroActa)
    {
        $this->numeroActa = $numeroActa;

        return $this;
    }

    /**
     * Get numeroActa
     *
     * @return string
     */
    public function getNumeroActa()
    {
        return $this->numeroActa;
    }

    /**
     * Set tipoInfraccion
     *
     * @param \GestionBundle\Entity\segVial\eventos\TipoInfraccion $tipoInfraccion
     *
     * @return Infraccion
     */
    public function setTipoInfraccion(\GestionBundle\Entity\segVial\eventos\TipoInfraccion $tipoInfraccion = null)
    {
        $this->tipoInfraccion = $tipoInfraccion;

        return $this;
    }

    /**
     * Get tipoInfraccion
     *
     * @return \GestionBundle\Entity\segVial\eventos\TipoInfraccion
     */
    public function getTipoInfraccion()
    {
        return $this->tipoInfraccion;
    }

    /**
     * Set notificado
     *
     * @param boolean $notificado
     *
     * @return Infraccion
     */
    public function setNotificado($notificado)
    {
        $this->notificado = $notificado;

        return $this;
    }

    /**
     * Get notificado
     *
     * @return boolean
     */
    public function getNotificado()
    {
        return $this->notificado;
    }

    /**
     * Set descontada
     *
     * @param boolean $descontada
     *
     * @return Infraccion
     */
    public function setDescontada($descontada)
    {
        $this->descontada = $descontada;

        return $this;
    }

    /**
     * Get descontada
     *
     * @return boolean
     */
    public function getDescontada()
    {
        return $this->descontada;
    }

    /**
     * Set aceptada
     *
     * @param boolean $aceptada
     *
     * @return Infraccion
     */
    public function setAceptada($aceptada)
    {
        $this->aceptada = $aceptada;

        return $this;
    }

    /**
     * Get aceptada
     *
     * @return boolean
     */
    public function getAceptada()
    {
        return $this->aceptada;
    }

    /**
     * Set vencimiento
     *
     * @param \DateTime $vencimiento
     *
     * @return Infraccion
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;

        return $this;
    }

    /**
     * Get vencimiento
     *
     * @return \DateTime
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     *
     * @return Infraccion
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return \DateTime
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set montoInicial
     *
     * @param float $montoInicial
     *
     * @return Infraccion
     */
    public function setMontoInicial($montoInicial)
    {
        $this->montoInicial = $montoInicial;

        return $this;
    }

    /**
     * Get montoInicial
     *
     * @return float
     */
    public function getMontoInicial()
    {
        return $this->montoInicial;
    }

    /**
     * Set montoAbonado
     *
     * @param float $montoAbonado
     *
     * @return Infraccion
     */
    public function setMontoAbonado($montoAbonado)
    {
        $this->montoAbonado = $montoAbonado;

        return $this;
    }

    /**
     * Get montoAbonado
     *
     * @return float
     */
    public function getMontoAbonado()
    {
        return $this->montoAbonado;
    }

    /**
     * Set cuotas
     *
     * @param integer $cuotas
     *
     * @return Infraccion
     */
    public function setCuotas($cuotas)
    {
        $this->cuotas = $cuotas;

        return $this;
    }

    /**
     * Get cuotas
     *
     * @return integer
     */
    public function getCuotas()
    {
        return $this->cuotas;
    }
}
