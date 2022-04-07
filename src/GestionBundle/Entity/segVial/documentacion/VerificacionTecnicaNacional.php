<?php

namespace GestionBundle\Entity\segVial\documentacion;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gest_docum_verificaciones_tecnicas_nacional")
 * @ORM\Entity
 */

class VerificacionTecnicaNacional extends VerificacionTecnica
{

      function __construct() {
          parent::__construct();
      }

     public function getTipoVtv()
     {
        return 'VTV Nacion';
     }

     public function getType()
     {
        return 1;
     }

    public function getTexto()
    {
        return "VTV Nacional";
    }

    public function getCalculaPagoAutomaticamente()
    {
        return false;
    }
}
