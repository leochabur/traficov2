<?php

namespace GestionBundle\Entity\segVial\opciones;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * MarcaChasis
 *
 * @ORM\Table(name="seg_vial_opciones_marca_chasis")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\opciones\MarcaChasisRepository")
 * @UniqueEntity(
 *     fields={"marca"},
 *     errorPath="marca",
 *     message="Marca de chasis existente en la Base de Datos",
 *     groups={"general", "tecnical"}
 * )
 */
class MarcaChasis
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
     * @ORM\Column(name="marca", type="string", length=255, unique=true)
     * @Assert\NotNull(message="El campo marca no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="activa", type="boolean", options={"default" : true})
     */
    private $activa = true;


    public function __toString()
    {
        return strtoupper($this->marca);
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
     * Set marca
     *
     * @param string $marca
     *
     * @return MarcaChasis
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    public function getActiva(): ?bool
    {
        return $this->activa;
    }

    public function setActiva(bool $activa): self
    {
        $this->activa = $activa;

        return $this;
    }
}
