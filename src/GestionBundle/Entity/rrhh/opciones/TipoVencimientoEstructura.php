<?php

namespace GestionBundle\Entity\rrhh\opciones;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoVencimientoEstructura
 *
 * @ORM\Table(name="rrhhopciones_tipo_vencimiento_estructura")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\rrhh\opciones\TipoVencimientoEstructuraRepository")
 */
class TipoVencimientoEstructura
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
     * @var int
     *
     * @ORM\Column(name="antelacion", type="integer")
     */
    private $antelacion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set antelacion
     *
     * @param integer $antelacion
     *
     * @return TipoVencimientoEstructura
     */
    public function setAntelacion($antelacion)
    {
        $this->antelacion = $antelacion;

        return $this;
    }

    /**
     * Get antelacion
     *
     * @return int
     */
    public function getAntelacion()
    {
        return $this->antelacion;
    }
}
