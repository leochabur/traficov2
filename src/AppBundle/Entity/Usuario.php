<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;


/**
 * Usuario
 *
 * @ORM\Table(name="security_usuarios")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 * @UniqueEntity(fields="username", message="Username already taken")
 */

class Usuario  implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=512)
     */
    private $password;

    /**
     * @ORM\Column(name="roles", type="string", columnDefinition="enum('ROLE_SUPER_ADMIN', 'ROLE_OPERADOR', 'ROLE_RESPONSABLE_TRAFICO', 'ROLE_RESPONSABLE_DIAGRAMACION')")
     */
    private $roles;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\ManyToMany(targetEntity="Estructura", inversedBy="usuarios")
     * @ORM\JoinTable(name="security_usuario_estructuras")
     */
    private $estructuras;

    /**
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumn(name="id_perfil", referencedColumnName="id", nullable=true)
     */
    private $perfil;

    /**
     * @ORM\Column(name="activo", type="boolean", nullable=false, options={"default":true})
     */
    private $activo = true;

    /**
     * @ORM\OneToMany(targetEntity="DefinicionInforme", mappedBy="usuario")
     */
    private $informes;


    public function __toString()
    {
        return $this->apellido.', '.$this->nombre;
    }

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
     * Set username
     *
     * @param string $username
     *
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }



    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function eraseCredentials()
    {
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Usuario
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }


    public function getRoles()
    {
        return [$this->roles];
    }

 

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return Usuario
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estructuras = new \Doctrine\Common\Collections\ArrayCollection();
        $this->informes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     *
     * @return Usuario
     */
    public function addEstructura(\AppBundle\Entity\Estructura $estructura)
    {
        $this->estructuras[] = $estructura;

        return $this;
    }

    /**
     * Remove estructura
     *
     * @param \AppBundle\Entity\Estructura $estructura
     */
    public function removeEstructura(\AppBundle\Entity\Estructura $estructura)
    {
        $this->estructuras->removeElement($estructura);
    }

    /**
     * Get estructuras
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstructuras()
    {
        return $this->estructuras;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * Set perfil
     *
     * @param \AppBundle\Entity\Perfil $perfil
     *
     * @return Usuario
     */
    public function setPerfil(\AppBundle\Entity\Perfil $perfil = null)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get perfil
     *
     * @return \AppBundle\Entity\Perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Add informe
     *
     * @param \AppBundle\Entity\DefinicionInforme $informe
     *
     * @return Usuario
     */
    public function addInforme(\AppBundle\Entity\DefinicionInforme $informe)
    {
        $this->informes[] = $informe;

        return $this;
    }

    /**
     * Remove informe
     *
     * @param \AppBundle\Entity\DefinicionInforme $informe
     */
    public function removeInforme(\AppBundle\Entity\DefinicionInforme $informe)
    {
        $this->informes->removeElement($informe);
    }

    /**
     * Get informes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInformes()
    {
        return $this->informes;
    }

    public function contieneEstructura(Estructura $estructura)
    {
        return $this->estructuras->contain($estructura);
    }
}
