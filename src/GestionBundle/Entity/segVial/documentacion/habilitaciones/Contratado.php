<?php

namespace GestionBundle\Entity\segVial\documentacion\habilitaciones;

use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\ventas\Cliente;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gest_docum_habilitaciones_nacional_ol_contratado")
 * @ORM\Entity
 */

class Contratado extends OfertaLibre
{

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\ventas\Cliente")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo cliente no puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $cliente;

    public function __toString()
    {
        return 'Oferta Libre Contratado - '.$this->getCodigoHabilitacion();
    }

    public  function getType()
    {
        return 12;
    }

    public function getTexto()
    {
        return "Oferta Libre (Contratado)";
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getCalculaPagoAutomaticamente()
    {
        return false;
    }
}
