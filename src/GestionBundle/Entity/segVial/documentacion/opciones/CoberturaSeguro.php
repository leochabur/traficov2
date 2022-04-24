<?php

namespace GestionBundle\Entity\segVial\documentacion\opciones;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * CoberturaSeguro
 *
 * @ORM\Table(name="gest_docum_opciones_coberturas_seguros")
 * @ORM\Entity
  * @UniqueEntity(
 *     fields={"cobertura"},
 *     errorPath="cobertura",
 *     message="Cobertura existente en la Base de Datos",
 *     groups={"general", "tecnical"}
 * )
 */

class CoberturaSeguro
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
     * @ORM\Column(name="cobertura", type="string", length=255)
     * @Assert\NotNull(message="El campo no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $cobertura;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requiereSumaAsegurada = false;


    public function __toString()
    {
        return strtoupper($this->cobertura);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCobertura(): ?string
    {
        return $this->cobertura;
    }

    public function setCobertura(string $cobertura): self
    {
        $this->cobertura = $cobertura;

        return $this;
    }

    public function getRequiereSumaAsegurada(): ?bool
    {
        return $this->requiereSumaAsegurada;
    }

    public function setRequiereSumaAsegurada(bool $requiereSumaAsegurada): self
    {
        $this->requiereSumaAsegurada = $requiereSumaAsegurada;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

}
