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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codigoPlanta;

    /**
     * @ORM\Column(type="string", length=3, nullable=true, columnDefinition="ENUM('PRO', 'NAC')"))
     */
    private $juisdiccion;

    public function getCodigoPlanta(): ?string
    {
        return $this->codigoPlanta;
    }

    public function setCodigoPlanta(string $codigoPlanta): self
    {
        $this->codigoPlanta = $codigoPlanta;

        return $this;
    }

    public function getJuisdiccion(): ?string
    {
        return $this->juisdiccion;
    }

    public function setJuisdiccion(?string $juisdiccion): self
    {
        $this->juisdiccion = $juisdiccion;

        return $this;
    }

    public function getJurisdiccionTexto()
    {
        if ($this->juisdiccion == 'PRO')
            return 'PROVINCIAL';
        elseif ($this->juisdiccion == 'NAC')
            return "NACIONAL";
        return;
    }

}
