<?php

namespace GestionBundle\Entity\segVial\documentacion;

use GestionBundle\Entity\Repository\Entity\segVial\documentacion\PlantaVerificacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gest_docum_plantas_verificacion")
 * @ORM\Entity(repositoryClass=PlantaVerificacionRepository::class)
 */

class PlantaVerificacion extends ProveedorExterno
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codigoPlanta;

    public function getCodigoPlanta(): ?string
    {
        return $this->codigoPlanta;
    }

    public function setCodigoPlanta(string $codigoPlanta): self
    {
        $this->codigoPlanta = $codigoPlanta;

        return $this;
    }

}
