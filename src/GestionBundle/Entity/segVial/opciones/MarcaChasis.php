<?php

namespace GestionBundle\Entity\segVial\opciones;

use Doctrine\ORM\Mapping as ORM;

/**
 * MarcaChasis
 *
 * @ORM\Table(name="seg_vial_opciones_marca_chasis")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\opciones\MarcaChasisRepository")
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
     */
    private $marca;


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
}
