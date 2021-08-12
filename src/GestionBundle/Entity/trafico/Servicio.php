<?php

namespace GestionBundle\Entity\trafico;

use AppBundle\Entity\Estructura;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad;
use GestionBundle\Entity\segVial\opciones\TipoMotor;
use GestionBundle\Entity\segVial\opciones\TipoSuspension;
use GestionBundle\Entity\segVial\opciones\TipoUnidad;
use GestionBundle\Entity\trafico\opciones\FrecuenciaServicio;
use GestionBundle\Entity\trafico\opciones\SentidoServicio;
use GestionBundle\Entity\trafico\opciones\TipoServicio;
use GestionBundle\Entity\ventas\Ciudad;
use GestionBundle\Entity\ventas\Cliente;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Servicio
 *
 * @ORM\Table(name="trafico_servicios")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\trafico\ServicioRepository")
 */
class Servicio
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
     * @ORM\Column(name="nombre", type="string", length=255)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Cliente")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Ciudad")
     * @ORM\JoinColumn(name="id_orgien", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $origen;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Ciudad")
     * @ORM\JoinColumn(name="id_origen", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $destino;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\trafico\opciones\FrecuenciaServicio")
     * @ORM\JoinColumn(name="id_frecuencia", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $frecuencia;

    /**
     * @var string
     *
     * @ORM\Column(name="latitudOrigen", type="decimal", precision=15, scale=13)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $latitudOrigen;

    /**
     * @var string
     *
     * @ORM\Column(name="longitudOrigen", type="decimal", precision=15, scale=13)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $longitudOrigen;

    /**
     * @var string
     *
     * @ORM\Column(name="latitudDestino", type="decimal", precision=15, scale=13)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $latitudDestino;

    /**
     * @var string
     *
     * @ORM\Column(name="longitudDestino", type="decimal", precision=15, scale=13)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $longitudDestino;

    /**
     * @var bool
     *
     * @ORM\Column(name="requiereUnidadHabilitada", type="boolean")
     */
    private $requiereUnidadHabilitada;

    /**
     * @var bool
     *
     * @ORM\Column(name="admiteFletero", type="boolean")
     */
    private $admiteFletero;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", options={"default": true})
     */
    private $activo = true;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\trafico\opciones\SentidoServicio")
     * @ORM\JoinColumn(name="id_sentido", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $sentido;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\trafico\opciones\TipoServicio")
     * @ORM\JoinColumn(name="id_tipo_servicio", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipoServicio;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad")
     * @ORM\JoinColumn(name="id_tipo_habilitacion", referencedColumnName="id")
     */
    private $tipoHabilitacion; //Para cubrir el caso que requiere CNRT ya que no podemos manejar un flag sino una entidad que represente el tipo de Habiitacion requerda

    /**
     * @var bool
     *
     * @ORM\Column(name="cierreAutomatico", type="boolean")
     */
    private $cierreAutomatico;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\opciones\TipoUnidad")
     * @ORM\JoinTable(name="trafico_tipos_unidad_por_servicio",
     *      joinColumns={@ORM\JoinColumn(name="id_servicio", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_tipo_unidad", referencedColumnName="id")}
     *      )
     */
    private $tiposUnidadPermitidos;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\opciones\TipoMotor")
     * @ORM\JoinTable(name="trafico_tipos_motor_por_servicio",
     *      joinColumns={@ORM\JoinColumn(name="id_servicio", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_tipo_motor", referencedColumnName="id")}
     *      )
     */
    private $tiposMotorPermitidos;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\opciones\TipoSuspension")
     * @ORM\JoinTable(name="trafico_tipos_suspension_por_servicio",
     *      joinColumns={@ORM\JoinColumn(name="id_servicio", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_tipo_suspension", referencedColumnName="id")}
     *      )
     */
    private $tiposSuspensionPermitidos;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estructura")
     * @ORM\JoinColumn(name="id_estructura", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $estructura;

    /**
     * @ORM\OneToMany(targetEntity="Turno", mappedBy="servicio")
     */
    private $turnos;

    public function __toString()
    {
        return strtoupper($this->nombre);
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
     * Constructor
     */
    public function __construct()
    {
        $this->tiposUnidadPermitidos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tiposMotorPermitidos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tiposSuspensionPermitidos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->turnos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Servicio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set latitudOrigen
     *
     * @param string $latitudOrigen
     *
     * @return Servicio
     */
    public function setLatitudOrigen($latitudOrigen)
    {
        $this->latitudOrigen = $latitudOrigen;

        return $this;
    }

    /**
     * Get latitudOrigen
     *
     * @return string
     */
    public function getLatitudOrigen()
    {
        return $this->latitudOrigen;
    }

    /**
     * Set longitudOrigen
     *
     * @param string $longitudOrigen
     *
     * @return Servicio
     */
    public function setLongitudOrigen($longitudOrigen)
    {
        $this->longitudOrigen = $longitudOrigen;

        return $this;
    }

    /**
     * Get longitudOrigen
     *
     * @return string
     */
    public function getLongitudOrigen()
    {
        return $this->longitudOrigen;
    }

    /**
     * Set latitudDestino
     *
     * @param string $latitudDestino
     *
     * @return Servicio
     */
    public function setLatitudDestino($latitudDestino)
    {
        $this->latitudDestino = $latitudDestino;

        return $this;
    }

    /**
     * Get latitudDestino
     *
     * @return string
     */
    public function getLatitudDestino()
    {
        return $this->latitudDestino;
    }

    /**
     * Set longitudDestino
     *
     * @param string $longitudDestino
     *
     * @return Servicio
     */
    public function setLongitudDestino($longitudDestino)
    {
        $this->longitudDestino = $longitudDestino;

        return $this;
    }

    /**
     * Get longitudDestino
     *
     * @return string
     */
    public function getLongitudDestino()
    {
        return $this->longitudDestino;
    }

    /**
     * Set requiereUnidadHabilitada
     *
     * @param boolean $requiereUnidadHabilitada
     *
     * @return Servicio
     */
    public function setRequiereUnidadHabilitada($requiereUnidadHabilitada)
    {
        $this->requiereUnidadHabilitada = $requiereUnidadHabilitada;

        return $this;
    }

    /**
     * Get requiereUnidadHabilitada
     *
     * @return boolean
     */
    public function getRequiereUnidadHabilitada()
    {
        return $this->requiereUnidadHabilitada;
    }

    /**
     * Set admiteFletero
     *
     * @param boolean $admiteFletero
     *
     * @return Servicio
     */
    public function setAdmiteFletero($admiteFletero)
    {
        $this->admiteFletero = $admiteFletero;

        return $this;
    }

    /**
     * Get admiteFletero
     *
     * @return boolean
     */
    public function getAdmiteFletero()
    {
        return $this->admiteFletero;
    }

    /**
     * Set cierreAutomatico
     *
     * @param boolean $cierreAutomatico
     *
     * @return Servicio
     */
    public function setCierreAutomatico($cierreAutomatico)
    {
        $this->cierreAutomatico = $cierreAutomatico;

        return $this;
    }

    /**
     * Get cierreAutomatico
     *
     * @return boolean
     */
    public function getCierreAutomatico()
    {
        return $this->cierreAutomatico;
    }

    /**
     * Set cliente
     *
     * @param \GestionBundle\Entity\ventas\Cliente $cliente
     *
     * @return Servicio
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
     * Set origen
     *
     * @param \GestionBundle\Entity\ventas\Ciudad $origen
     *
     * @return Servicio
     */
    public function setOrigen(\GestionBundle\Entity\ventas\Ciudad $origen = null)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return \GestionBundle\Entity\ventas\Ciudad
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set frecuencia
     *
     * @param \GestionBundle\Entity\trafico\opciones\FrecuenciaServicio $frecuencia
     *
     * @return Servicio
     */
    public function setFrecuencia(\GestionBundle\Entity\trafico\opciones\FrecuenciaServicio $frecuencia = null)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return \GestionBundle\Entity\trafico\opciones\FrecuenciaServicio
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * Add tiposUnidadPermitido
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoUnidad $tiposUnidadPermitido
     *
     * @return Servicio
     */
    public function addTiposUnidadPermitido(\GestionBundle\Entity\segVial\opciones\TipoUnidad $tiposUnidadPermitido)
    {
        $this->tiposUnidadPermitidos[] = $tiposUnidadPermitido;

        return $this;
    }

    /**
     * Remove tiposUnidadPermitido
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoUnidad $tiposUnidadPermitido
     */
    public function removeTiposUnidadPermitido(\GestionBundle\Entity\segVial\opciones\TipoUnidad $tiposUnidadPermitido)
    {
        $this->tiposUnidadPermitidos->removeElement($tiposUnidadPermitido);
    }

    /**
     * Get tiposUnidadPermitidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTiposUnidadPermitidos()
    {
        return $this->tiposUnidadPermitidos;
    }

    /**
     * Add tiposMotorPermitido
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoMotor $tiposMotorPermitido
     *
     * @return Servicio
     */
    public function addTiposMotorPermitido(\GestionBundle\Entity\segVial\opciones\TipoMotor $tiposMotorPermitido)
    {
        $this->tiposMotorPermitidos[] = $tiposMotorPermitido;

        return $this;
    }

    /**
     * Remove tiposMotorPermitido
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoMotor $tiposMotorPermitido
     */
    public function removeTiposMotorPermitido(\GestionBundle\Entity\segVial\opciones\TipoMotor $tiposMotorPermitido)
    {
        $this->tiposMotorPermitidos->removeElement($tiposMotorPermitido);
    }

    /**
     * Get tiposMotorPermitidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTiposMotorPermitidos()
    {
        return $this->tiposMotorPermitidos;
    }

    /**
     * Add tiposSuspensionPermitido
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoSuspension $tiposSuspensionPermitido
     *
     * @return Servicio
     */
    public function addTiposSuspensionPermitido(\GestionBundle\Entity\segVial\opciones\TipoSuspension $tiposSuspensionPermitido)
    {
        $this->tiposSuspensionPermitidos[] = $tiposSuspensionPermitido;

        return $this;
    }

    /**
     * Remove tiposSuspensionPermitido
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoSuspension $tiposSuspensionPermitido
     */
    public function removeTiposSuspensionPermitido(\GestionBundle\Entity\segVial\opciones\TipoSuspension $tiposSuspensionPermitido)
    {
        $this->tiposSuspensionPermitidos->removeElement($tiposSuspensionPermitido);
    }

    /**
     * Get tiposSuspensionPermitidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTiposSuspensionPermitidos()
    {
        return $this->tiposSuspensionPermitidos;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Servicio
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
     * Set sentido
     *
     * @param \GestionBundle\Entity\trafico\opciones\SentidoServicio $sentido
     *
     * @return Servicio
     */
    public function setSentido(\GestionBundle\Entity\trafico\opciones\SentidoServicio $sentido = null)
    {
        $this->sentido = $sentido;

        return $this;
    }

    /**
     * Get sentido
     *
     * @return \GestionBundle\Entity\trafico\opciones\SentidoServicio
     */
    public function getSentido()
    {
        return $this->sentido;
    }

    /**
     * Set tipoServicio
     *
     * @param \GestionBundle\Entity\trafico\opciones\TipoServicio $tipoServicio
     *
     * @return Servicio
     */
    public function setTipoServicio(\GestionBundle\Entity\trafico\opciones\TipoServicio $tipoServicio = null)
    {
        $this->tipoServicio = $tipoServicio;

        return $this;
    }

    /**
     * Get tipoServicio
     *
     * @return \GestionBundle\Entity\trafico\opciones\TipoServicio
     */
    public function getTipoServicio()
    {
        return $this->tipoServicio;
    }

    /**
     * Set tipoHabilitacion
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $tipoHabilitacion
     *
     * @return Servicio
     */
    public function setTipoHabilitacion(\GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $tipoHabilitacion = null)
    {
        $this->tipoHabilitacion = $tipoHabilitacion;

        return $this;
    }

    /**
     * Get tipoHabilitacion
     *
     * @return \GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad
     */
    public function getTipoHabilitacion()
    {
        return $this->tipoHabilitacion;
    }

    /**
     * Set destino
     *
     * @param \GestionBundle\Entity\ventas\Ciudad $destino
     *
     * @return Servicio
     */
    public function setDestino(\GestionBundle\Entity\ventas\Ciudad $destino = null)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return \GestionBundle\Entity\ventas\Ciudad
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     *
     * @return Servicio
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
     * Add turno
     *
     * @param \GestionBundle\Entity\trafico\Turno $turno
     *
     * @return Servicio
     */
    public function addTurno(\GestionBundle\Entity\trafico\Turno $turno)
    {
        $this->turnos[] = $turno;

        return $this;
    }

    /**
     * Remove turno
     *
     * @param \GestionBundle\Entity\trafico\Turno $turno
     */
    public function removeTurno(\GestionBundle\Entity\trafico\Turno $turno)
    {
        $this->turnos->removeElement($turno);
    }

    /**
     * Get turnos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTurnos()
    {
        return $this->turnos;
    }
}
