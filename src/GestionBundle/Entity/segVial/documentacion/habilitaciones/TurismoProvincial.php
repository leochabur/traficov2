<?php

namespace GestionBundle\Entity\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\opciones\TipoHabilitacionProvincia;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gest_docum_habilitaciones_turismo_provincial")
 * @ORM\Entity
 */
class TurismoProvincial extends HabilitacionProvincial
{

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\documentacion\opciones\TipoHabilitacionProvincia")
     * @ORM\JoinColumn(name="id_tipo_hab_pcia", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(message="El campo tipo habilitacion puede permanecer en blanco", groups={"general", "tecnical"})
     */
    private $tipoHabilitacion;

    public function __toString()
    {
        return 'Turismo Provincial - '.$this->getCodigoHabilitacion();
    }

    public  function getType()
    {
        return 14;
    }

    public function getTexto()
    {
        return "Habilitacion Turismo Provincial";
    }

    public function getTipoHabilitacion(): ?TipoHabilitacionProvincia
    {
        return $this->tipoHabilitacion;
    }

    public function setTipoHabilitacion(?TipoHabilitacionProvincia $tipoHabilitacion): self
    {
        $this->tipoHabilitacion = $tipoHabilitacion;

        return $this;
    }

}
