<?php

namespace GestionBundle\Entity\rrhh;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use GestionBundle\Entity\opciones\TipoVencimiento;

/**
 * TipoLicencia
 *
 * @ORM\Table(name="rrhh_opciones_tipo_vencimiento")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\rrhh\TipoVencimientoPersonalRepository")
 */

class TipoVencimientoPersonal extends TipoVencimiento
{


}
