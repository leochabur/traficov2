<?php

namespace GestionBundle\Entity\ventas;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Ciudad
 *
 * @ORM\Table(name="ventas_ciudad")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\ventas\CiudadRepository")
 * @UniqueEntity(
 *     fields={"nombre", "provincia"},
 *     errorPath="nombre",
 *     message="Ciudad existente en la Base de Datos!"
 * )
 */
class Ciudad
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
     * @Assert\NotNull(message="El campo nombre no puede permanecer en blanco")
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumn(name="id_provincia", referencedColumnName="id")
     * @Assert\NotNull(message="El campo provincia no puede permanecer en blanco")
     */
    private $provincia;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Estructura")
     * @ORM\JoinTable(name="ventas_ciudades_estructuras",
     *      joinColumns={@ORM\JoinColumn(name="id_ciudad", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_estructura", referencedColumnName="id")}
     *      )
     */
    private $estructuras;

    /**
     * @ORM\Column(name="activo", type="boolean", options={"default": true})
     */
    private $activo = true;
    
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
     * @return Ciudad
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
     * Set provincia
     *
     * @param \GestionBundle\Entity\ventas\Provincia $provincia
     *
     * @return Ciudad
     */
    public function setProvincia(\GestionBundle\Entity\ventas\Provincia $provincia = null)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return \GestionBundle\Entity\ventas\Provincia
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Ciudad
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
     * Constructor
     */
    public function __construct()
    {
        $this->estructuras = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     *
     * @return Ciudad
     */
    public function addEstructura(\AppBundle\Entity\Estructura $estructura)
    {
        $this->estructuras[] = $estructura;

        return $this;
    }

    /**
     * Remove estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     */
    public function removeEstructura(\AppBundle\Entity\Estructura $estructura)
    {
        $this->estructuras->removeElement($estructura);
    }

    /**
     * Get estructuras
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstructuras()
    {
        return $this->estructuras;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     *
     * @return Ciudad
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     *
     * @return Ciudad
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string
     */
    public function getLongitud()
    {
        return $this->longitud;
    }
}
