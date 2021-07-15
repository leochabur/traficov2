<?php

namespace GestionBundle\Entity\segVial\eventos;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Evento
 *
 * @ORM\Table(name="seg_vial_eventos_evento")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\eventos\EventoRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="eventtype", type="integer")
 * @ORM\DiscriminatorMap({1:"Evento",2: "Suceso", 3: "Infraccion"})
 */

abstract class Evento
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
     * @ORM\Column(name="prefijo", type="string", length=255)
     */
    private $prefijo;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @ORM\OneToOne(targetEntity="UbicacionEvento", cascade={"persist", "remove"}, inversedBy="evento")
     * @ORM\JoinColumn(name="id_ubicacion_evento", referencedColumnName="id", nullable=true)
     * @Assert\Valid()
     */
    private $ubicacion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estructura")
     * @ORM\JoinColumn(name="id_estructura", referencedColumnName="id", nullable=true)
     */
    private $estructura;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="id_usuario_alta", referencedColumnName="id")
     */
    private $usuarioAlta;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="id_usuario_baja", referencedColumnName="id", nullable=true)
     */
    private $usuarioBaja;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\rrhh\Personal")
     * @ORM\JoinTable(name="seg_vial_eventos_tripulacion_evento",
     *      joinColumns={@ORM\JoinColumn(name="id_evento", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_personal", referencedColumnName="id")}
     *      )
     */
    private $tripulacion;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Cliente")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id", nullable=true)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\Unidad")
     * @ORM\JoinColumn(name="id_unidad", referencedColumnName="id", nullable=true)
     */
    private $unidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eliminado", type="boolean")
     */
    private $eliminado = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAlta", type="datetime")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaBaja", type="datetime", nullable=true)
     */
    private $fechaBaja;


    public static function getPrefix() {

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
     * Set prefijo
     *
     * @param string $prefijo
     *
     * @return Evento
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Evento
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Evento
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return Evento
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Evento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set eliminado
     *
     * @param boolean $eliminado
     *
     * @return Evento
     */
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;

        return $this;
    }

    /**
     * Get eliminado
     *
     * @return boolean
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Evento
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return Evento
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set ubicacion
     *
     * @param \GestionBundle\Entity\segVial\eventos\UbicacionEvento $ubicacion
     *
     * @return Evento
     */
    public function setUbicacion(\GestionBundle\Entity\segVial\eventos\UbicacionEvento $ubicacion = null)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return \GestionBundle\Entity\segVial\eventos\UbicacionEvento
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     *
     * @return Evento
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

    /**
     * Set usuarioAlta
     *
     * @param \AppBundle\Entity\Usuario $usuarioAlta
     *
     * @return Evento
     */
    public function setUsuarioAlta(\AppBundle\Entity\Usuario $usuarioAlta = null)
    {
        $this->usuarioAlta = $usuarioAlta;

        return $this;
    }

    /**
     * Get usuarioAlta
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuarioAlta()
    {
        return $this->usuarioAlta;
    }

    /**
     * Set usuarioBaja
     *
     * @param \AppBundle\Entity\Usuario $usuarioBaja
     *
     * @return Evento
     */
    public function setUsuarioBaja(\AppBundle\Entity\Usuario $usuarioBaja = null)
    {
        $this->usuarioBaja = $usuarioBaja;

        return $this;
    }

    /**
     * Get usuarioBaja
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuarioBaja()
    {
        return $this->usuarioBaja;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tripulacion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tripulacion
     *
     * @param \GestionBundle\Entity\rrhh\Personal $tripulacion
     *
     * @return Evento
     */
    public function addTripulacion(\GestionBundle\Entity\rrhh\Personal $tripulacion)
    {
        $this->tripulacion[] = $tripulacion;

        return $this;
    }

    /**
     * Remove tripulacion
     *
     * @param \GestionBundle\Entity\rrhh\Personal $tripulacion
     */
    public function removeTripulacion(\GestionBundle\Entity\rrhh\Personal $tripulacion)
    {
        $this->tripulacion->removeElement($tripulacion);
    }

    /**
     * Get tripulacion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTripulacion()
    {
        return $this->tripulacion;
    }

    /**
     * Set cliente
     *
     * @param \GestionBundle\Entity\ventas\Cliente $cliente
     *
     * @return Evento
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
     * Set unidad
     *
     * @param \GestionBundle\Entity\segVial\Unidad $unidad
     *
     * @return Evento
     */
    public function setUnidad(\GestionBundle\Entity\segVial\Unidad $unidad = null)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get unidad
     *
     * @return \GestionBundle\Entity\segVial\Unidad
     */
    public function getUnidad()
    {
        return $this->unidad;
    }
}
