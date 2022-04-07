<?php

namespace GestionBundle\Entity\segVial\documentacion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use GestionBundle\Entity\Repository\Entity\segVial\documentacion\SeguroRepository;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\documentacion\opciones\CoberturaSeguro;
use GestionBundle\Entity\segVial\documentacion\opciones\TipoDestinoSeguro;

/**
 * @ORM\Table(name="gest_docum_seguro_unidades")
 * @ORM\Entity(repositoryClass=SeguroRepository::class)
 */

class Seguro extends VencimientoUnidad
{

    /** 
     * @ORM\Column
     * 
     */
    private $poliza;

    /** 
     * @ORM\Column(nullable=true) 
     * 
     */
    private $asegurado;

    /** 
     * @ORM\Column(nullable=true) 
     * 
     */
    private $tomador;
    
    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\documentacion\opciones\TipoDestinoSeguro")
     * @ORM\JoinColumn(name="id_tipo_destino", referencedColumnName="id", nullable=true)
     */
    private $tipoDestinoSeguro;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\documentacion\opciones\CoberturaSeguro")
     * @ORM\JoinColumn(name="id_cobertura", referencedColumnName="id", nullable=true)
     */
    private $cobertura;

    public function getTexto()
    {
        return "Seguro Automotor";
    }

    public function getType()
    {
        return 3;
    }

    public function __toString()
    {
        return 'POLIZA '.$this->poliza.' - ' .$this->getProveedor();
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function getTipoDestinoSeguro(): ?TipoDestinoSeguro
    {
        return $this->tipoDestinoSeguro;
    }

    public function setTipoDestinoSeguro(?TipoDestinoSeguro $tipoDestinoSeguro): self
    {
        $this->tipoDestinoSeguro = $tipoDestinoSeguro;

        return $this;
    }

    public function getPoliza(): ?string
    {
        return $this->poliza;
    }

    public function setPoliza(string $poliza): self
    {
        $this->poliza = $poliza;

        return $this;
    }

    public function getAsegurado(): ?string
    {
        return $this->asegurado;
    }

    public function setAsegurado(?string $asegurado): self
    {
        $this->asegurado = $asegurado;

        return $this;
    }

    public function getTomador(): ?string
    {
        return $this->tomador;
    }

    public function setTomador(?string $tomador): self
    {
        $this->tomador = $tomador;

        return $this;
    }

    public function getCobertura(): ?CoberturaSeguro
    {
        return $this->cobertura;
    }

    public function setCobertura(?CoberturaSeguro $cobertura): self
    {
        $this->cobertura = $cobertura;

        return $this;
    }

    public function getCalculaPagoAutomaticamente()
    {
        return false;
    }

}
