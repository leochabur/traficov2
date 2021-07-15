<?php

namespace GestionBundle\Entity\segVial\eventos;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TipoInfraccion
 *
 * @ORM\Table(name="seg_vialeventos_tipo_infraccion")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\eventos\TipoInfraccionRepository")
 * @UniqueEntity("tipo", message ="Tipo Infraccion existente en la BD")
 */
class TipoInfraccion
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
     * @ORM\Column(name="tipo", type="string", length=255)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipo;


    public function __toString()
    {
        return ($this->tipo);
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TipoInfraccion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
