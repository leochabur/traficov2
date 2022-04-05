<?php

namespace GestionBundle\Entity\segVial\documentacion\habilitaciones;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use GestionBundle\Entity\Repository\Entity\segVial\documentacion\habilitaciones\HabilitacionRepository;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\Unidad;
use GestionBundle\Entity\segVial\documentacion\VencimientoUnidad;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gest_docum_habilitaciones")
 * @ORM\Entity(repositoryClass=HabilitacionRepository::class)
 */

abstract class Habilitacion extends VencimientoUnidad
{

    /** 
     * @ORM\Column
     * @Assert\NotNull(message="El campo codigo habilitacion no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $codigoHabilitacion;

    public function __construct()
    {
          parent::__construct();

    }

    public function getCodigoHabilitacion(): ?string
    {
        return $this->codigoHabilitacion;
    }

    public function setCodigoHabilitacion(string $codigoHabilitacion): self
    {
        $this->codigoHabilitacion = $codigoHabilitacion;

        return $this;
    }


}
