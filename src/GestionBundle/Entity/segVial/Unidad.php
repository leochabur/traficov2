<?php

namespace GestionBundle\Entity\segVial;

use AppBundle\Entity\Estructura;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\opciones\DocumentoAdjunto;
use GestionBundle\Entity\opciones\TipoVencimiento;
use GestionBundle\Entity\opciones\TipoVencimientoUnidad;
use GestionBundle\Entity\rrhh\Propietario;
use GestionBundle\Entity\segVial\documentacion\VencimientoUnidad;
use GestionBundle\Entity\segVial\opciones\CalidadUnidad;
use GestionBundle\Entity\segVial\opciones\HabilitacionUnidad;
use GestionBundle\Entity\segVial\opciones\MarcaChasis;
use GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad;
use GestionBundle\Entity\segVial\opciones\TipoMotor;
use GestionBundle\Entity\segVial\opciones\TipoUnidad;
use GestionBundle\Entity\segVial\opciones\UbicacionMotor;
use GestionBundle\Entity\ventas\Provincia;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Unidad
 *
 * @ORM\Table(name="seg_vial_unidades")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\UnidadRepository")
 * @UniqueEntity(
 *     fields={"interno", "propietario"},
 *     errorPath="interno",
 *     message="Interno existente para el propietario!",
 *     groups={"general", "tecnical", "inscription"}
 * )
 */
class Unidad
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $imagen;

    /**
     * @var int
     *
     * @ORM\Column(name="interno", type="integer")
     * @Assert\NotNull(message="El campo interno no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $interno;

    /**
     *
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\MarcaChasis")
     * @ORM\JoinColumn(name="id_marca_chasis", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo Chasis Marca no puede permanecer en blanco", groups={"tecnical"})
     */
    private $chasisMarca;

    /**
     * @var string
     *
     * @ORM\Column(name="chasisModelo", type="string", length=255, nullable=true)
     * @Assert\NotNull(message="El campo Chasis Modelo no puede permanecer en blanco", groups={"tecnical"})
     */
    private $chasisModelo;

    /**
     * @var string
     *
     * @ORM\Column(name="chasisNumero", type="string", length=255, nullable=true)
     * @Assert\NotNull(message="El campo Chasis Numero no puede permanecer en blanco", groups={"tecnical"})
     */
    private $chasisNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="carroceriaMarca", type="string", length=255, nullable=true)
     * @Assert\NotNull(message="El campo Carroceria Marca no puede permanecer en blanco", groups={"tecnical"})
     */
    private $carroceriaMarca;

    /**
     * @var string
     *
     * @ORM\Column(name="carroceriaModelo", type="string", length=255, nullable=true)
     * @Assert\NotNull(message="El campo Carroceria Modelo no puede permanecer en blanco", groups={"tecnical"})
     */
    private $carroceriaModelo;

    /**
     * @var int
     *
     * @ORM\Column(name="capacidadReal", type="integer", nullable=true)
     * @Assert\NotNull(message="El campo Capacidad Real no puede permanecer en blanco", groups={"tecnical"})
     */
    private $capacidadReal;

    /**
     * @var int
     *
     * @ORM\Column(name="capacidadCNRT", type="integer", nullable=true)
     * @Assert\NotNull(message="El campo Capacidad Autorizada no puede permanecer en blanco", groups={"tecnical"})
     */
    private $capacidadCNRT;

    /**
     * @var string
     *
     * @ORM\Column(name="motorMarca", type="string", length=255, nullable=true)
     */
    private $motorMarca;

    /**
     * @var string
     *
     * @ORM\Column(name="motorNumero", type="string", length=255, nullable=true)
     */
    private $motorNumero;

    /**
     * @var float
     *
     * @ORM\Column(name="consumo", type="float", nullable=true)
     */
    private $consumo;

    /**
     * @var bool
     *
     * @ORM\Column(name="audioVideo", type="boolean", nullable=true)
     */
    private $audioVideo;

    /**
     * @var bool
     *
     * @ORM\Column(name="banio", type="boolean", nullable=true)
     */
    private $banio;

    /**
     * @var bool
     *
     * @ORM\Column(name="bar", type="boolean", nullable=true)
     */
    private $bar;

    /**
     * @var string
     *
     * @ORM\Column(name="dominio", type="string", length=7, nullable=true)
     * @Assert\NotNull(message="El campo Dominio no puede permanecer en blanco", groups={"general"})
     */
    private $dominio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInscripcion", type="date", nullable=true)
     * @Assert\NotNull(message="El campo Fecha de Inscripcion no puede permanecer en blanco", groups={"inscription"})
     */
    private $fechaInscripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="anioModelo", type="integer", nullable=true)
     * @Assert\NotNull(message="El campo Modelo Año no puede permanecer en blanco", groups={"inscription"})
     */
    private $anioModelo;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\UbicacionMotor")
     * @ORM\JoinColumn(name="id_ubicacion_motor", referencedColumnName="id", nullable=true)
     */
    private $ubicacionMotor;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\HabilitacionUnidad")
     * @ORM\JoinColumn(name="id_habilitacion", referencedColumnName="id", nullable=true)
     */
    private $habilitacion;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroTac", type="string", length=255, nullable=true)
     */
    private $numeroTacografo;

    /**
     * @var string
     *
     * @ORM\Column(name="marcaTac", type="string", length=255, nullable=true)
     */
    private $marcaTacografo;

    /**
     * @var bool
     *
     * @ORM\Column(name="ploteo", type="boolean", nullable=true)
     */
    private $ploteo;

    /**
     * @var bool
     *
     * @ORM\Column(name="carteleraElectronica", type="boolean", nullable=true)
     */
    private $carteleraElectronica;

    /**
     * @var float
     *
     * @ORM\Column(name="capacidadTanque", type="integer", nullable=true)
     * @Assert\NotNull(message="El campo Capacidad Tanque no puede permanecer en blanco", groups={"tecnical"})
     */
    private $capacidadTanque;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidadTanques", type="integer", nullable=true)
     * @Assert\NotNull(message="El campo Cantidad Tanques no puede permanecer en blanco", groups={"tecnical"})
     */
    private $cantidadTanques;

    /**
     * @var bool
     *
     * @ORM\Column(name="pcABordo", type="boolean", nullable=true)
     */
    private $pcABordo;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\rrhh\Propietario")
     * @ORM\JoinColumn(name="id_propietario", referencedColumnName="id")
     * @Assert\NotNull(message="El campo Propietario no puede permanecer en blanco")
     */
    private $propietario;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\rrhh\Propietario")
     * @ORM\JoinColumn(name="id_op_resp", referencedColumnName="id")
     * @Assert\NotNull(message="El campo Operador Responsable no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $operadorResponsable;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\TipoUnidad")
     * @ORM\JoinColumn(name="id_tipo_unidad", referencedColumnName="id")
     * @Assert\NotNull(message="El campo Tipo de Unidad no puede permanecer en blanco")
     */
    private $tipoUnidad;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\TipoMotor")
     * @ORM\JoinColumn(name="id_tipo_motor", referencedColumnName="id", nullable=true)
     */
    private $tipoMotor;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\CalidadUnidad")
     * @ORM\JoinColumn(name="id_calidad_unidad", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo Operador Responsable no puede permanecer en blanco", groups={"tecnical"})
     */
    private $calidadUnidad;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Provincia")
     * @ORM\JoinColumn(name="id_radicacion", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo Radicacion no puede permanecer en blanco", groups={"inscription"})
     */
    private $radicacion;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad")
     * @ORM\JoinTable(name="seg_vial_habilitaciones_unidades",
     *      joinColumns={@ORM\JoinColumn(name="id_unidad", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_tipo_habilitacion", referencedColumnName="id")}
     *      )
     */
    private $habilitaciones;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estructura")
     * @ORM\JoinColumn(name="id_str_habitual", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo Estructura Habitual no puede permanecer en blanco")
     */
    private $estructuraHabitual;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estructura")
     * @ORM\JoinColumn(name="id_str_actual", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo Estructura Actual no puede permanecer en blanco")
     */
    private $estructuraActual;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", options={"default": true})
     */
    private $activo = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="confirmado", type="boolean")
     */
    private $confirmado = false;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\documentacion\TipoVencimiento")
     * @ORM\JoinTable(name="seg_vial_unidades_tipos_vencimientos",
     *      joinColumns={@ORM\JoinColumn(name="id_unidad", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_tipo_vto", referencedColumnName="id")}
     *      )
     */
    private $tiposVencimientos;

    /**
     * @ORM\OneToMany(targetEntity="GestionBundle\Entity\opciones\DocumentoAdjunto", mappedBy="unidad") 
     */
    private $documentos;

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\documentacion\VencimientoUnidad", mappedBy="unidades")
     */
    private $vencimientos;
    

    public function __toString()
    {
        return $this->interno.'';
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set interno
     *
     * @param integer $interno
     *
     * @return Unidad
     */
    public function setInterno($interno)
    {
        $this->interno = $interno;

        return $this;
    }

    /**
     * Get interno
     *
     * @return integer
     */
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * Set chasisModelo
     *
     * @param string $chasisModelo
     *
     * @return Unidad
     */
    public function setChasisModelo($chasisModelo)
    {
        $this->chasisModelo = $chasisModelo;

        return $this;
    }

    /**
     * Get chasisModelo
     *
     * @return string
     */
    public function getChasisModelo()
    {
        return $this->chasisModelo;
    }

    /**
     * Set chasisNumero
     *
     * @param string $chasisNumero
     *
     * @return Unidad
     */
    public function setChasisNumero($chasisNumero)
    {
        $this->chasisNumero = $chasisNumero;

        return $this;
    }

    /**
     * Get chasisNumero
     *
     * @return string
     */
    public function getChasisNumero()
    {
        return $this->chasisNumero;
    }

    /**
     * Set carroceriaMarca
     *
     * @param string $carroceriaMarca
     *
     * @return Unidad
     */
    public function setCarroceriaMarca($carroceriaMarca)
    {
        $this->carroceriaMarca = $carroceriaMarca;

        return $this;
    }

    /**
     * Get carroceriaMarca
     *
     * @return string
     */
    public function getCarroceriaMarca()
    {
        return $this->carroceriaMarca;
    }

    /**
     * Set carroceriaModelo
     *
     * @param string $carroceriaModelo
     *
     * @return Unidad
     */
    public function setCarroceriaModelo($carroceriaModelo)
    {
        $this->carroceriaModelo = $carroceriaModelo;

        return $this;
    }

    /**
     * Get carroceriaModelo
     *
     * @return string
     */
    public function getCarroceriaModelo()
    {
        return $this->carroceriaModelo;
    }

    /**
     * Set capacidadReal
     *
     * @param integer $capacidadReal
     *
     * @return Unidad
     */
    public function setCapacidadReal($capacidadReal)
    {
        $this->capacidadReal = $capacidadReal;

        return $this;
    }

    /**
     * Get capacidadReal
     *
     * @return integer
     */
    public function getCapacidadReal()
    {
        return $this->capacidadReal;
    }

    /**
     * Set capacidadCNRT
     *
     * @param integer $capacidadCNRT
     *
     * @return Unidad
     */
    public function setCapacidadCNRT($capacidadCNRT)
    {
        $this->capacidadCNRT = $capacidadCNRT;

        return $this;
    }

    /**
     * Get capacidadCNRT
     *
     * @return integer
     */
    public function getCapacidadCNRT()
    {
        return $this->capacidadCNRT;
    }

    /**
     * Set motorMarca
     *
     * @param string $motorMarca
     *
     * @return Unidad
     */
    public function setMotorMarca($motorMarca)
    {
        $this->motorMarca = $motorMarca;

        return $this;
    }

    /**
     * Get motorMarca
     *
     * @return string
     */
    public function getMotorMarca()
    {
        return $this->motorMarca;
    }

    /**
     * Set motorNumero
     *
     * @param string $motorNumero
     *
     * @return Unidad
     */
    public function setMotorNumero($motorNumero)
    {
        $this->motorNumero = $motorNumero;

        return $this;
    }

    /**
     * Get motorNumero
     *
     * @return string
     */
    public function getMotorNumero()
    {
        return $this->motorNumero;
    }

    /**
     * Set consumo
     *
     * @param float $consumo
     *
     * @return Unidad
     */
    public function setConsumo($consumo)
    {
        $this->consumo = $consumo;

        return $this;
    }

    /**
     * Get consumo
     *
     * @return float
     */
    public function getConsumo()
    {
        return $this->consumo;
    }

    /**
     * Set audioVideo
     *
     * @param boolean $audioVideo
     *
     * @return Unidad
     */
    public function setAudioVideo($audioVideo)
    {
        $this->audioVideo = $audioVideo;

        return $this;
    }

    /**
     * Get audioVideo
     *
     * @return boolean
     */
    public function getAudioVideo()
    {
        return $this->audioVideo;
    }

    /**
     * Set banio
     *
     * @param boolean $banio
     *
     * @return Unidad
     */
    public function setBanio($banio)
    {
        $this->banio = $banio;

        return $this;
    }

    /**
     * Get banio
     *
     * @return boolean
     */
    public function getBanio()
    {
        return $this->banio;
    }

    /**
     * Set bar
     *
     * @param boolean $bar
     *
     * @return Unidad
     */
    public function setBar($bar)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get bar
     *
     * @return boolean
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     *
     * @return Unidad
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;

        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \DateTime
     */
    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set anioModelo
     *
     * @param integer $anioModelo
     *
     * @return Unidad
     */
    public function setAnioModelo($anioModelo)
    {
        $this->anioModelo = $anioModelo;

        return $this;
    }

    /**
     * Get anioModelo
     *
     * @return integer
     */
    public function getAnioModelo()
    {
        return $this->anioModelo;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Unidad
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set ploteo
     *
     * @param boolean $ploteo
     *
     * @return Unidad
     */
    public function setPloteo($ploteo)
    {
        $this->ploteo = $ploteo;

        return $this;
    }

    /**
     * Get ploteo
     *
     * @return boolean
     */
    public function getPloteo()
    {
        return $this->ploteo;
    }

    /**
     * Set carteleraElectronica
     *
     * @param boolean $carteleraElectronica
     *
     * @return Unidad
     */
    public function setCarteleraElectronica($carteleraElectronica)
    {
        $this->carteleraElectronica = $carteleraElectronica;

        return $this;
    }

    /**
     * Get carteleraElectronica
     *
     * @return boolean
     */
    public function getCarteleraElectronica()
    {
        return $this->carteleraElectronica;
    }

    /**
     * Set capacidadTanque
     *
     * @param float $capacidadTanque
     *
     * @return Unidad
     */
    public function setCapacidadTanque($capacidadTanque)
    {
        $this->capacidadTanque = $capacidadTanque;

        return $this;
    }

    /**
     * Get capacidadTanque
     *
     * @return float
     */
    public function getCapacidadTanque()
    {
        return $this->capacidadTanque;
    }

    /**
     * Set cantidadTanques
     *
     * @param integer $cantidadTanques
     *
     * @return Unidad
     */
    public function setCantidadTanques($cantidadTanques)
    {
        $this->cantidadTanques = $cantidadTanques;

        return $this;
    }

    /**
     * Get cantidadTanques
     *
     * @return integer
     */
    public function getCantidadTanques()
    {
        return $this->cantidadTanques;
    }

    /**
     * Set pcABordo
     *
     * @param boolean $pcABordo
     *
     * @return Unidad
     */
    public function setPcABordo($pcABordo)
    {
        $this->pcABordo = $pcABordo;

        return $this;
    }

    /**
     * Get pcABordo
     *
     * @return boolean
     */
    public function getPcABordo()
    {
        return $this->pcABordo;
    }

    /**
     * Set propietario
     *
     * @param \GestionBundle\Entity\rrhh\Propietario $propietario
     *
     * @return Unidad
     */
    public function setPropietario(\GestionBundle\Entity\rrhh\Propietario $propietario = null)
    {
        $this->propietario = $propietario;

        return $this;
    }

    /**
     * Get propietario
     *
     * @return \GestionBundle\Entity\rrhh\Propietario
     */
    public function getPropietario()
    {
        return $this->propietario;
    }

    /**
     * Set tipoUnidad
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidad
     *
     * @return Unidad
     */
    public function setTipoUnidad(\GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidad = null)
    {
        $this->tipoUnidad = $tipoUnidad;

        return $this;
    }

    /**
     * Get tipoUnidad
     *
     * @return \GestionBundle\Entity\segVial\opciones\TipoUnidad
     */
    public function getTipoUnidad()
    {
        return $this->tipoUnidad;
    }

    /**
     * Set tipoMotor
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoMotor $tipoMotor
     *
     * @return Unidad
     */
    public function setTipoMotor(\GestionBundle\Entity\segVial\opciones\TipoMotor $tipoMotor = null)
    {
        $this->tipoMotor = $tipoMotor;

        return $this;
    }

    /**
     * Get tipoMotor
     *
     * @return \GestionBundle\Entity\segVial\opciones\TipoMotor
     */
    public function getTipoMotor()
    {
        return $this->tipoMotor;
    }

    /**
     * Set calidadUnidad
     *
     * @param \GestionBundle\Entity\segVial\opciones\CalidadUnidad $calidadUnidad
     *
     * @return Unidad
     */
    public function setCalidadUnidad(\GestionBundle\Entity\segVial\opciones\CalidadUnidad $calidadUnidad = null)
    {
        $this->calidadUnidad = $calidadUnidad;

        return $this;
    }

    /**
     * Get calidadUnidad
     *
     * @return \GestionBundle\Entity\segVial\opciones\CalidadUnidad
     */
    public function getCalidadUnidad()
    {
        return $this->calidadUnidad;
    }

    /**
     * Set radicacion
     *
     * @param \GestionBundle\Entity\ventas\Provincia $radicacion
     *
     * @return Unidad
     */
    public function setRadicacion(\GestionBundle\Entity\ventas\Provincia $radicacion = null)
    {
        $this->radicacion = $radicacion;

        return $this;
    }

    /**
     * Get radicacion
     *
     * @return \GestionBundle\Entity\ventas\Provincia
     */
    public function getRadicacion()
    {
        return $this->radicacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->habilitaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documentos = new ArrayCollection();
        $this->vencimientos = new ArrayCollection();
        $this->tiposVencimientos = new ArrayCollection();

    }

    /**
     * Add habilitacione
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione
     *
     * @return Unidad
     */
    public function addHabilitacione(\GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione)
    {
        $this->habilitaciones[] = $habilitacione;

        return $this;
    }

    /**
     * Remove habilitacione
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione
     */
    public function removeHabilitacione(\GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad $habilitacione)
    {
        $this->habilitaciones->removeElement($habilitacione);
    }

    /**
     * Get habilitaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHabilitaciones()
    {
        return $this->habilitaciones;
    }

    public function getDominio()
    {
        return strtoupper($this->dominio);
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Unidad
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
     * Set confirmado
     *
     * @param boolean $confirmado
     *
     * @return Unidad
     */
    public function setConfirmado($confirmado)
    {
        $this->confirmado = $confirmado;

        return $this;
    }

    /**
     * Get confirmado
     *
     * @return boolean
     */
    public function getConfirmado()
    {
        return $this->confirmado;
    }


    /**
     * Set estructuraHabitual
     *
     * @param \AppBundle\Entity\Estructura $estructuraHabitual
     *
     * @return Unidad
     */
    public function setEstructuraHabitual(\AppBundle\Entity\Estructura $estructuraHabitual = null)
    {
        $this->estructuraHabitual = $estructuraHabitual;

        return $this;
    }

    /**
     * Get estructuraHabitual
     *
     * @return \AppBundle\Entity\Estructura
     */
    public function getEstructuraHabitual()
    {
        return $this->estructuraHabitual;
    }

    /**
     * Set estructuraActual
     *
     * @param \AppBundle\Entity\Estructura $estructuraActual
     *
     * @return Unidad
     */
    public function setEstructuraActual(\AppBundle\Entity\Estructura $estructuraActual = null)
    {
        $this->estructuraActual = $estructuraActual;

        return $this;
    }

    /**
     * Get estructuraActual
     *
     * @return \AppBundle\Entity\Estructura
     */
    public function getEstructuraActual()
    {
        return $this->estructuraActual;
    }

    /**
     * Set dominio
     *
     * @param string $dominio
     *
     * @return Unidad
     */
    public function setDominio($dominio)
    {
        $this->dominio = $dominio;

        return $this;
    }

    /**
     * Set chasisMarca
     *
     * @param \GestionBundle\Entity\segVial\opciones\MarcaChasis $chasisMarca
     *
     * @return Unidad
     */
    public function setChasisMarca(\GestionBundle\Entity\segVial\opciones\MarcaChasis $chasisMarca = null)
    {
        $this->chasisMarca = $chasisMarca;

        return $this;
    }

    /**
     * Get chasisMarca
     *
     * @return \GestionBundle\Entity\segVial\opciones\MarcaChasis
     */
    public function getChasisMarca()
    {
        return $this->chasisMarca;
    }

    /**
     * Set operadorResponsable
     *
     * @param \GestionBundle\Entity\rrhh\Propietario $operadorResponsable
     *
     * @return Unidad
     */
    public function setOperadorResponsable(\GestionBundle\Entity\rrhh\Propietario $operadorResponsable = null)
    {
        $this->operadorResponsable = $operadorResponsable;

        return $this;
    }

    /**
     * Get operadorResponsable
     *
     * @return \GestionBundle\Entity\rrhh\Propietario
     */
    public function getOperadorResponsable()
    {
        return $this->operadorResponsable;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Unidad
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @return Collection|DocumentoAdjunto[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(DocumentoAdjunto $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
        }

        return $this;
    }

    public function removeDocumento(DocumentoAdjunto $documento): self
    {
        $this->documentos->removeElement($documento);

        return $this;
    }

    public function getUbicacionMotor(): ?UbicacionMotor
    {
        return $this->ubicacionMotor;
    }

    public function setUbicacionMotor(?UbicacionMotor $ubicacionMotor): self
    {
        $this->ubicacionMotor = $ubicacionMotor;

        return $this;
    }

    public function getHabilitacion(): ?HabilitacionUnidad
    {
        return $this->habilitacion;
    }

    public function setHabilitacion(?HabilitacionUnidad $habilitacion): self
    {
        $this->habilitacion = $habilitacion;

        return $this;
    }

    public function getNumeroTacografo(): ?string
    {
        return $this->numeroTacografo;
    }

    public function setNumeroTacografo(?string $numeroTacografo): self
    {
        $this->numeroTacografo = $numeroTacografo;

        return $this;
    }

    public function getMarcaTacografo(): ?string
    {
        return $this->marcaTacografo;
    }

    public function setMarcaTacografo(?string $marcaTacografo): self
    {
        $this->marcaTacografo = $marcaTacografo;

        return $this;
    }

    /**
     * @return Collection|VencimientoUnidad[]
     */
    public function getVencimientos(): Collection
    {
        return $this->vencimientos;
    }

    public function addVencimiento(VencimientoUnidad $vencimiento): self
    {
        if (!$this->vencimientos->contains($vencimiento)) {
            $this->vencimientos[] = $vencimiento;
            $vencimiento->addUnidade($this);
        }

        return $this;
    }

    public function removeVencimiento(VencimientoUnidad $vencimiento): self
    {
        if ($this->vencimientos->removeElement($vencimiento)) {
            $vencimiento->removeUnidade($this);
        }

        return $this;
    }

    /**
     * @return Collection|\GestionBundle\Entity\segVial\documentacion\TipoVencimiento[]
     */
    public function getTiposVencimientos(): Collection
    {
        return $this->tiposVencimientos;
    }

    public function addTiposVencimiento(\GestionBundle\Entity\segVial\documentacion\TipoVencimiento $tiposVencimiento): self
    {
        if (!$this->tiposVencimientos->contains($tiposVencimiento)) {
            $this->tiposVencimientos[] = $tiposVencimiento;
        }

        return $this;
    }

    public function removeTiposVencimiento(\GestionBundle\Entity\segVial\documentacion\TipoVencimiento $tiposVencimiento): self
    {
        $this->tiposVencimientos->removeElement($tiposVencimiento);

        return $this;
    }
}
