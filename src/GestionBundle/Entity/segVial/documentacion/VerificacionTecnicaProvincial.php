<?php

namespace GestionBundle\Entity\segVial\documentacion;

use GestionBundle\Entity\Repository\Entity\segVial\documentacion\VerificacionTecnicaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gest_docum_verificaciones_tecnicas_provincial")
 * @ORM\Entity
 */

class VerificacionTecnicaProvincial extends VerificacionTecnica
{

      function __construct() {
          parent::__construct();
      }

     public function getTipoVtv()
     {
        return 'VTV Provincia';
     }

     public function getType()
     {
        return 2;
     }

    public function getTexto()
    {
        return "VTV Provincial";
    }

    public function getCalculaPagoAutomaticamente()
    {
        return false;
    }
}
