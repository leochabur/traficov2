<?php

namespace GestionBundle\Entity\segVial\documentacion\habilitaciones;

use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\ventas\Ciudad;


/**
 * @ORM\Table(name="gest_docum_habilitaciones_nacional_ol_charter")
 * @ORM\Entity
 */

class Charter extends OfertaLibre
{
    public function __toString()
    {
        return 'Oferta Libre Charter - '.$this->getCodigoHabilitacion();
    }

    public  function getType()
    {
        return 11;
    }

    public function getTexto()
    {
        return "Oferta Libre (Charter)";
    }

}
