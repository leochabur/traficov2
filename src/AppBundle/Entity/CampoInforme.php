<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampoInforme
 *
 * @ORM\Table(name="perfil_campo_informe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CampoInformeRepository")
 */
class CampoInforme
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
     * @var string
     *
     * @ORM\Column(name="campo", type="string", length=255)
     */
    private $campo;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer")
     */
    private $orden;

    /**
     * @ORM\ManyToOne(targetEntity="DefinicionInforme", inversedBy="campos")
     * @ORM\JoinColumn(name="id_informe", referencedColumnName="id")
     */
    private $informe;


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
     * Set campo
     *
     * @param string $campo
     *
     * @return CampoInforme
     */
    public function setCampo($campo)
    {
        $this->campo = $campo;

        return $this;
    }

    /**
     * Get campo
     *
     * @return string
     */
    public function getCampo()
    {
        return $this->campo;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return CampoInforme
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return int
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set informe
     *
     * @param \AppBundle\Entity\DefinicionInforme $informe
     *
     * @return CampoInforme
     */
    public function setInforme(\AppBundle\Entity\DefinicionInforme $informe = null)
    {
        $this->informe = $informe;

        return $this;
    }

    /**
     * Get informe
     *
     * @return \AppBundle\Entity\DefinicionInforme
     */
    public function getInforme()
    {
        return $this->informe;
    }
}
