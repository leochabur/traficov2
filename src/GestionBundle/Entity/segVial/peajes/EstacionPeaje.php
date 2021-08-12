<?php

namespace GestionBundle\Entity\segVial\peajes;

use AppBundle\Entity\Estructura;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * EstacionPeaje
 *
 * @ORM\Table(name="seg_vial_peajes_estacion_peaje")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\peajes\EstacionPeajeRepository")
 * @UniqueEntity(
 *     fields={"nombre", "estructura"},
 *     errorPath="nombre",
 *     message="Estacion existente en la BD!"
 * )
 */
class EstacionPeaje
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
     * @var float
     *
     * @ORM\Column(name="latitud", type="float", nullable=true)
     */
    private $latitud;

    /**
     * @var float
     *
     * @ORM\Column(name="longitud", type="float", nullable=true)
     */
    private $longitud;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estructura")
     * @ORM\JoinColumn(name="id_estructura", referencedColumnName="id")
     */
    private $estructura;
    

    public function __toString()
    {
        return $this->nombre;
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EstacionPeaje
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
     * Set latitud
     *
     * @param float $latitud
     *
     * @return EstacionPeaje
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
     * @param float $longitud
     *
     * @return EstacionPeaje
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     *
     * @return EstacionPeaje
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
