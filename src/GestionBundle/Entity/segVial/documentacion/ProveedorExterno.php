<?php

namespace GestionBundle\Entity\segVial\documentacion;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gest_docum_proveedor_externo")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="extType", type="integer")
 * @ORM\DiscriminatorMap({1:"ProveedorExterno", 2: "CompaniaSeguro", 3: "PlantaVerificacion", 4:"OrganismoEstatal"})
 */
abstract class ProveedorExterno
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cuit;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="El campo razon social no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $razonSocial;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    public function __toString()
    {
        return strtoupper($this->razonSocial);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuit(): ?string
    {
        return $this->cuit;
    }

    public function setCuit(?string $cuit): self
    {
        $this->cuit = $cuit;

        return $this;
    }

    public function getRazonSocial(): ?string
    {
        return $this->razonSocial;
    }

    public function setRazonSocial(string $razonSocial): self
    {
        $this->razonSocial = $razonSocial;

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
