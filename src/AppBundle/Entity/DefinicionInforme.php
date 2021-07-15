<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DefinicionInforme
 *
 * @ORM\Table(name="perfil_definicion_informe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DefinicionInformeRepository")
 */
class DefinicionInforme
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="informes")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @ORM\OneToMany(targetEntity="CampoInforme", mappedBy="informe")
     */
    private $campos;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return DefinicionInforme
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->campos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return DefinicionInforme
     */
    public function setUsuario(\AppBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Add campo
     *
     * @param \AppBundle\Entity\CampoInforme $campo
     *
     * @return DefinicionInforme
     */
    public function addCampo(\AppBundle\Entity\CampoInforme $campo)
    {
        $this->campos[] = $campo;

        return $this;
    }

    /**
     * Remove campo
     *
     * @param \AppBundle\Entity\CampoInforme $campo
     */
    public function removeCampo(\AppBundle\Entity\CampoInforme $campo)
    {
        $this->campos->removeElement($campo);
    }

    /**
     * Get campos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCampos()
    {
        return $this->campos;
    }
}
