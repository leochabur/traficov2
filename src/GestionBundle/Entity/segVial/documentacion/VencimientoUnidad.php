<?php

namespace GestionBundle\Entity\segVial\documentacion;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use GestionBundle\Entity\Repository\Entity\segVial\documentacion\VencimientoUnidadRepository;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\segVial\Unidad;

/**
 * @ORM\Table(name="gest_docum_vencimientos_unidades")
 * @ORM\Entity(repositoryClass=VencimientoUnidadRepository::class)
 */

abstract class VencimientoUnidad extends Vencimiento
{

    /**
     * @ORM\ManyToMany(targetEntity="GestionBundle\Entity\segVial\Unidad", inversedBy="vencimientos")
     * @ORM\JoinTable(name="gest_docum_unidades_por_vencimiento")
     */
    private $unidades;


    public function __construct()
    {
          parent::__construct();
        $this->unidades = new ArrayCollection();
    }

    /**
     * @return Collection|Unidad[]
     */
    public function getUnidades(): Collection
    {
        return $this->unidades;
    }

    public function addUnidade(Unidad $unidade): self
    {
        if (!$this->unidades->contains($unidade)) {
            $this->unidades[] = $unidade;
        }

        return $this;
    }

    public function removeUnidade(Unidad $unidade): self
    {
        $this->unidades->removeElement($unidade);

        return $this;
    }


}
