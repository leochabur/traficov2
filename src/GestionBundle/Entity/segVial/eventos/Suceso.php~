<?php

namespace GestionBundle\Entity\segVial\eventos;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Suceso
 *
 * @ORM\Table(name="seg_vial_eventos_suceso")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\segVial\eventos\SucesoRepository")
 */
class Suceso extends Evento
{
    /**
     * @ORM\ManyToOne(targetEntity="TipoSuceso")
     * @ORM\JoinColumn(name="id_tipo_suceso", referencedColumnName="id")
     * @Assert\NotNull(message="El campo no puede permanecer en blanco")
     */
    private $tipoSuceso;

    /**
     * Set tipoSuceso
     *
     * @param \GestionBundle\Entity\segVial\eventos\TipoSuceso $tipoSuceso
     *
     * @return Suceso
     */
    public function setTipoSuceso(\GestionBundle\Entity\segVial\eventos\TipoSuceso $tipoSuceso = null)
    {
        $this->tipoSuceso = $tipoSuceso;

        return $this;
    }

    /**
     * Get tipoSuceso
     *
     * @return \GestionBundle\Entity\segVial\eventos\TipoSuceso
     */
    public function getTipoSuceso()
    {
        return $this->tipoSuceso;
    }
}
