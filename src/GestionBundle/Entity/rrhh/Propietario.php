<?php

namespace GestionBundle\Entity\rrhh;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Propietario
 *
 * @ORM\Table(name="rrhh_propietario")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\rrhh\PropietarioRepository")
 */
class Propietario
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
     * @ORM\Column(name="razonSocial", type="string", length=255)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $cuit;


    public function __toString()
    {
        return strtoupper($this->razonSocial);
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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Propietario
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     *
     * @return Propietario
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    public function getFormatCuit()
    {
        $cuit = '';
        if ($this->cuit)
        {
            $cuit = substr($this->cuit, 0, 2).'-'.substr($this->cuit, 2,8).'-'.substr($this->cuit, 10);
        }
        return strtoupper($cuit);
    }
}
