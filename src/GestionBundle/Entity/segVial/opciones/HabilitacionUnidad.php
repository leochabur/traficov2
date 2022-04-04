<?php

namespace GestionBundle\Entity\segVial\opciones;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * HabilitacionUnidad
 *
 * @ORM\Table(name="seg_vialopciones_habilitaciones_unidad")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\opciones\HabilitacionUnidadRepository")
  * @UniqueEntity(
 *     fields={"habilitacion"},
 *     errorPath="habilitacion",
 *     message="Calidad de unidad existente en la Base de Datos"
 * )
 */
class HabilitacionUnidad   ///correspondoe a habilitaciones CNRT
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
     * @ORM\Column(name="calidad", type="string", length=255)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $habilitacion;

    public function __toString()
    {
        return strtoupper($this->habilitacion);
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

    public function getHabilitacion(): ?string
    {
        return $this->habilitacion;
    }

    public function setHabilitacion(string $habilitacion): self
    {
        $this->habilitacion = $habilitacion;

        return $this;
    }
}
