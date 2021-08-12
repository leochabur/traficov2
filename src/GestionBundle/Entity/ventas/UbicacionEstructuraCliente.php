<?php

namespace GestionBundle\Entity\ventas;

use AppBundle\Entity\Estructura;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UbicacionEstructura
 *
 * @ORM\Table(name="ventas_ubicacion_estructura")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\ventas\UbicacionEstructuraRepository")
 */
class UbicacionEstructuraCliente
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
     * @ORM\Column(name="latitud", type="decimal", precision=15, scale=12)
     * @Assert\NotNull(message="El campo latitud no puede permanecer en blanco")
     */
    private $latitud;

    /**
     * @ORM\Column(name="longitud", type="decimal", precision=15, scale=12)
     * @Assert\NotNull(message="El campo longitud no puede permanecer en blanco")
     */
    private $longitud;

    /**
     * @ORM\ManyToOne(targetEntity="Ciudad")
     * @ORM\JoinColumn(name="id_ciudad", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $ciudad;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estructura")
     * @ORM\JoinColumn(name="id_estructura", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $estructura;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="ubicaciones")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     */
    private $cliente;

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
     * Set latitud
     *
     * @param float $latitud
     *
     * @return UbicacionEstructuraCliente
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param integer $longitud
     *
     * @return UbicacionEstructuraCliente
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return integer
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set ciudad
     *
     * @param \GestionBundle\Entity\ventas\Ciudad $ciudad
     *
     * @return UbicacionEstructuraCliente
     */
    public function setCiudad(\GestionBundle\Entity\ventas\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \GestionBundle\Entity\ventas\Ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set cliente
     *
     * @param \GestionBundle\Entity\ventas\Cliente $cliente
     *
     * @return UbicacionEstructuraCliente
     */
    public function setCliente(\GestionBundle\Entity\ventas\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \GestionBundle\Entity\ventas\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }



    /**
     * Set estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     *
     * @return UbicacionEstructuraCliente
     */
    public function setEstructura(\AppBundle\Entity\Estructura $estructura = null)
    {
        $this->estructura = $estructura;

        return $this;
    }

    /**
     * Get estructura
     *
     * @return \AppBundle\Entity\Estructura
     */
    public function getEstructura()
    {
        return $this->estructura;
    }
}
