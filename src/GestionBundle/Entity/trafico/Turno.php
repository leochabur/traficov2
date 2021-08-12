<?php

namespace GestionBundle\Entity\trafico;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\opciones\TipoUnidad;
use GestionBundle\Entity\trafico\opciones\FrecuenciaTurno;
use GestionBundle\Entity\trafico\opciones\TurnoCliente;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Turno
 *
 * @ORM\Table(name="trafico_turnos")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\trafico\TurnoRepository")
 */
class Turno
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
     * @ORM\ManyToOne(targetEntity="Servicio", inversedBy="turnos")
     * @ORM\JoinColumn(name="id_servicio", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $servicio;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\trafico\opciones\TurnoCliente")
     * @ORM\JoinColumn(name="id_turno", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $turnoCliente;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\trafico\opciones\FrecuenciaTurno")
     * @ORM\JoinTable(name="trafico_frecuencia_turnos",
     *      joinColumns={@ORM\JoinColumn(name="id_turno", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_frecuencia", referencedColumnName="id")}
     *      )
     */
    private $frecuencias;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\opciones\TipoUnidad")
     * @ORM\JoinTable(name="trafico_tipo_unidad_turnos",
     *      joinColumns={@ORM\JoinColumn(name="id_turno", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="idd_tipo_unidad", referencedColumnName="id")}
     *      )
     */
    private $tipoUnidadesSolicitadas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaInicial", type="time")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $horaInicial;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="horaFinal", type="time")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $horaFinal;

    /**
     * @var int
     *
     * @ORM\Column(name="kmRecorrido", type="integer")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $kmRecorrido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duracion", type="time")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $duracion;

    /**
     * @var int
     *
     * @ORM\Column(name="numeroPaxSolicitado", type="integer")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $numeroPaxSolicitado;

    /**
     * @var int
     *
     * @ORM\Column(name="antiguedad", type="integer")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $antiguedad; //antiguedad maxima de la unidad que debe realizar el servicio

    /**
     * @ORM\Column(name="requiereBanio", type="boolean", nullable=true)
     */
    private $requiereBanio;

    /**
     * @ORM\Column(name="activo", type="boolean", options={"default": true})
     */
    private $activo = true;

    /**
     * @ORM\OneToOne(targetEntity="Turno")
     * @ORM\JoinColumn(name="id_turno_asociado", referencedColumnName="id", nullable=true)
     */
    private $turnoAsociado;

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
     * Set horaInicial
     *
     * @param \DateTime $horaInicial
     *
     * @return Turno
     */
    public function setHoraInicial($horaInicial)
    {
        $this->horaInicial = $horaInicial;

        return $this;
    }

    /**
     * Get horaInicial
     *
     * @return \DateTime
     */
    public function getHoraInicial()
    {
        return $this->horaInicial;
    }

    /**
     * Set horaFinal
     *
     * @param string $horaFinal
     *
     * @return Turno
     */
    public function setHoraFinal($horaFinal)
    {
        $this->horaFinal = $horaFinal;

        return $this;
    }

    /**
     * Get horaFinal
     *
     * @return string
     */
    public function getHoraFinal()
    {
        return $this->horaFinal;
    }

    /**
     * Set kmRecorrido
     *
     * @param integer $kmRecorrido
     *
     * @return Turno
     */
    public function setKmRecorrido($kmRecorrido)
    {
        $this->kmRecorrido = $kmRecorrido;

        return $this;
    }

    /**
     * Get kmRecorrido
     *
     * @return int
     */
    public function getKmRecorrido()
    {
        return $this->kmRecorrido;
    }

    /**
     * Set duracion
     *
     * @param \DateTime $duracion
     *
     * @return Turno
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return \DateTime
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set numeroPaxSolicitado
     *
     * @param integer $numeroPaxSolicitado
     *
     * @return Turno
     */
    public function setNumeroPaxSolicitado($numeroPaxSolicitado)
    {
        $this->numeroPaxSolicitado = $numeroPaxSolicitado;

        return $this;
    }

    /**
     * Get numeroPaxSolicitado
     *
     * @return int
     */
    public function getNumeroPaxSolicitado()
    {
        return $this->numeroPaxSolicitado;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->frecuencias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tipoUnidadesSolicitadas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set servicio
     *
     * @param \GestionBundle\Entity\trafico\Servicio $servicio
     *
     * @return Turno
     */
    public function setServicio(\GestionBundle\Entity\trafico\Servicio $servicio = null)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return \GestionBundle\Entity\trafico\Servicio
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Add frecuencia
     *
     * @param \GestionBundle\Entity\trafico\opciones\FrecuenciaTurno $frecuencia
     *
     * @return Turno
     */
    public function addFrecuencia(\GestionBundle\Entity\trafico\opciones\FrecuenciaTurno $frecuencia)
    {
        $this->frecuencias[] = $frecuencia;

        return $this;
    }

    /**
     * Remove frecuencia
     *
     * @param \GestionBundle\Entity\trafico\opciones\FrecuenciaTurno $frecuencia
     */
    public function removeFrecuencia(\GestionBundle\Entity\trafico\opciones\FrecuenciaTurno $frecuencia)
    {
        $this->frecuencias->removeElement($frecuencia);
    }

    /**
     * Get frecuencias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFrecuencias()
    {
        return $this->frecuencias;
    }

    /**
     * Set turnoCliente
     *
     * @param \GestionBundle\Entity\trafico\opciones\TurnoCliente $turnoCliente
     *
     * @return Turno
     */
    public function setTurnoCliente(\GestionBundle\Entity\trafico\opciones\TurnoCliente $turnoCliente = null)
    {
        $this->turnoCliente = $turnoCliente;

        return $this;
    }

    /**
     * Get turnoCliente
     *
     * @return \GestionBundle\Entity\trafico\opciones\TurnoCliente
     */
    public function getTurnoCliente()
    {
        return $this->turnoCliente;
    }

    /**
     * Set antiguedad
     *
     * @param integer $antiguedad
     *
     * @return Turno
     */
    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;

        return $this;
    }

    /**
     * Get antiguedad
     *
     * @return integer
     */
    public function getAntiguedad()
    {
        return $this->antiguedad;
    }

    /**
     * Set requiereBanio
     *
     * @param boolean $requiereBanio
     *
     * @return Turno
     */
    public function setRequiereBanio($requiereBanio)
    {
        $this->requiereBanio = $requiereBanio;

        return $this;
    }

    /**
     * Get requiereBanio
     *
     * @return boolean
     */
    public function getRequiereBanio()
    {
        return $this->requiereBanio;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Turno
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

    /**
     * Add tipoUnidadesSolicitada
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidadesSolicitada
     *
     * @return Turno
     */
    public function addTipoUnidadesSolicitada(\GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidadesSolicitada)
    {
        $this->tipoUnidadesSolicitadas[] = $tipoUnidadesSolicitada;

        return $this;
    }

    /**
     * Remove tipoUnidadesSolicitada
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidadesSolicitada
     */
    public function removeTipoUnidadesSolicitada(\GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidadesSolicitada)
    {
        $this->tipoUnidadesSolicitadas->removeElement($tipoUnidadesSolicitada);
    }

    /**
     * Get tipoUnidadesSolicitadas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTipoUnidadesSolicitadas()
    {
        return $this->tipoUnidadesSolicitadas;
    }

    /**
     * Set turnoAsociado
     *
     * @param \GestionBundle\Entity\trafico\Turno $turnoAsociado
     *
     * @return Turno
     */
    public function setTurnoAsociado(\GestionBundle\Entity\trafico\Turno $turnoAsociado = null)
    {
        $this->turnoAsociado = $turnoAsociado;

        return $this;
    }

    /**
     * Get turnoAsociado
     *
     * @return \GestionBundle\Entity\trafico\Turno
     */
    public function getTurnoAsociado()
    {
        return $this->turnoAsociado;
    }
}
