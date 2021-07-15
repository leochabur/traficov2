<?php

namespace GestionBundle\Entity\rrhh;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * TipoLicencia
 *
 * @ORM\Table(name="rrhh_tipo_licencia")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\rrhh\TipoVencimientoPersonalRepository")
 * @UniqueEntity(
 *     fields={"tipo"},
 *     errorPath="tipo",
 *     message="Tipo de Vencimiento Existente en la BD!"
 * )
 */
class TipoVencimientoPersonal
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
     * @ORM\Column(name="tipo", type="string", length=255, unique=true)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipo;


    public function __toString()
    {
        return strtoupper($this->tipo);
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
     * @return TipoLicencia
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
