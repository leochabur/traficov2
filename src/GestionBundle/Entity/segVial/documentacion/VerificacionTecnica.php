<?php

namespace GestionBundle\Entity\segVial\documentacion;
use GestionBundle\Entity\Repository\Entity\segVial\documentacion\VerificacionTecnicaRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Table(name="gest_docum_verificaciones_tecnicas")
 * @ORM\Entity(repositoryClass=VerificacionTecnicaRepository::class)
 */

abstract class VerificacionTecnica extends VencimientoUnidad
{

    /** 
     * @ORM\Column
     * 
     */
    private $numeroCertificado;


    /** 
     * @ORM\Column(type="float")
     * @Assert\Type(        
     *     type="float",
     *     message="El importe debe ser numerico",
     *     groups={"general"}
     * )
     * @Assert\NotNull(message="Debe ingresar un importe", groups={"general", "tecnical"})
     */
    private $importe;

    function __construct() {
          parent::__construct();
    }


    public function __toString()
    {
        return $this->getTipoVtv()." - ".$this->numeroCertificado;
    }

    public abstract function getTipoVtv();

    public function getInterno()
    {
        return $this->getUnidades()->first();
    }

    public function getNumeroCertificado(): ?string
    {
        return $this->numeroCertificado;
    }

    public function setNumeroCertificado(string $numeroCertificado): self
    {
        $this->numeroCertificado = $numeroCertificado;

        return $this;
    }

    public function getImporte(): ?float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

}
