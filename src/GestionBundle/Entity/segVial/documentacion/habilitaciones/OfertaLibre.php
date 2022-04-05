<?php

namespace GestionBundle\Entity\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\Repository\Entity\segVial\documentacion\habilitaciones\OfertaLibreRepository;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\ventas\Ciudad;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gest_docum_habilitaciones_oferta_libre")
 * @ORM\Entity(repositoryClass=OfertaLibreRepository::class)
 */
abstract class OfertaLibre extends HabilitacionNacional
{
    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Ciudad")
     * @ORM\JoinColumn(name="id_origen", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo origen no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $origen;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Ciudad")
     * @ORM\JoinColumn(name="id_destino", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo destino no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $destino;

    public function getOrigen(): ?Ciudad
    {
        return $this->origen;
    }

    public function setOrigen(?Ciudad $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getDestino(): ?Ciudad
    {
        return $this->destino;
    }

    public function setDestino(?Ciudad $destino): self
    {
        $this->destino = $destino;

        return $this;
    }


}
