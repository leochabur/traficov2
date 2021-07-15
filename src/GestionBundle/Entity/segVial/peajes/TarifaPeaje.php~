<?php

namespace GestionBundle\Entity\segVial\peajes;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * TarifaPeaje
 *
 * @ORM\Table(name="seg_vial_peajes_tarifa_peaje")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\peajes\TarifaPeajeRepository")
 * @UniqueEntity(
 *     fields={"tipoUnidad", "estacionPeaje"},
 *     errorPath="tipoUnidad",
 *     message="Existe una tarifa para el tipo de unidad!"
 * )
 */
class TarifaPeaje
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
     * @var float
     *
     * @ORM\Column(name="tarifaNormal", type="float")
     */
    private $tarifaNormal;

    /**
     * @var float
     *
     * @ORM\Column(name="tarifaTelepase", type="float")
     */
    private $tarifaTelepase;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\opciones\TipoUnidad")
     * @ORM\JoinColumn(name="id_tipo_unidad", referencedColumnName="id")
     */
    private $tipoUnidad;

    /**
     * @ORM\ManyToOne(targetEntity="EstacionPeaje")
     * @ORM\JoinColumn(name="id_estacion_peaje", referencedColumnName="id")
     */
    private $estacionPeaje;


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
     * Set tarifaNormal
     *
     * @param float $tarifaNormal
     *
     * @return TarifaPeaje
     */
    public function setTarifaNormal($tarifaNormal)
    {
        $this->tarifaNormal = $tarifaNormal;

        return $this;
    }

    /**
     * Get tarifaNormal
     *
     * @return float
     */
    public function getTarifaNormal()
    {
        return $this->tarifaNormal;
    }

    /**
     * Set tarifaTelepase
     *
     * @param float $tarifaTelepase
     *
     * @return TarifaPeaje
     */
    public function setTarifaTelepase($tarifaTelepase)
    {
        $this->tarifaTelepase = $tarifaTelepase;

        return $this;
    }

    /**
     * Get tarifaTelepase
     *
     * @return float
     */
    public function getTarifaTelepase()
    {
        return $this->tarifaTelepase;
    }

    /**
     * Set tipoUnidad
     *
     * @param \GestionBundle\Entity\segVial\opciones\TipoUnidad $tipoUnidad
     *
     * @return TarifaPeaje
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
     * Set estacionPeaje
     *
     * @param \GestionBundle\Entity\segVial\peajes\EstacionPeaje $estacionPeaje
     *
     * @return TarifaPeaje
     */
    public function setEstacionPeaje(\GestionBundle\Entity\segVial\peajes\EstacionPeaje $estacionPeaje = null)
    {
        $this->estacionPeaje = $estacionPeaje;

        return $this;
    }

    /**
     * Get estacionPeaje
     *
     * @return \GestionBundle\Entity\segVial\peajes\EstacionPeaje
     */
    public function getEstacionPeaje()
    {
        return $this->estacionPeaje;
    }
}
