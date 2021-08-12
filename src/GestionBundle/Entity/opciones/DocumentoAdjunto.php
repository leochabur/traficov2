<?php
namespace GestionBundle\Entity\opciones;

use AppBundle\Entity\Estructura;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\opciones\TipoVencimiento;
use GestionBundle\Entity\rrhh\Propietario;
use GestionBundle\Entity\segVial\Unidad;
use GestionBundle\Entity\segVial\opciones\CalidadUnidad;
use GestionBundle\Entity\segVial\opciones\MarcaChasis;
use GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad;
use GestionBundle\Entity\segVial\opciones\TipoMotor;
use GestionBundle\Entity\segVial\opciones\TipoUnidad;
use GestionBundle\Entity\ventas\Provincia;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Unidad
 *
 * @ORM\Table(name="system_documentos_adjuntos")
 * @ORM\Entity()
 */
class DocumentoAdjunto {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $imagen;

    /**
     *
     * @ORM\ManyToOne(targetEntity="TipoVencimientoDocumentoAdjunto")
     * @ORM\JoinColumn(name="id_tipo", referencedColumnName="id")
     * @Assert\NotNull(message="El campo Tipo Documento no puede permanecer en blanco")
     */
    private $tipoDocumento;

    /**
     *
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\segVial\Unidad", inversedBy="documentos")
     * @ORM\JoinColumn(name="id_unidad", referencedColumnName="id")
     * @Assert\NotNull(message="El campo Unidad no puede permanecer en blanco")
     */
    private $unidad;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getTipoDocumento(): ?TipoVencimientoDocumentoAdjunto
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(?TipoVencimientoDocumentoAdjunto $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getUnidad(): ?Unidad
    {
        return $this->unidad;
    }

    public function setUnidad(?Unidad $unidad): self
    {
        $this->unidad = $unidad;

        return $this;
    }

}