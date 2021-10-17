<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pertenenciaetnica
 *
 * @ORM\Table(name="pertenenciaetnica")
 * @ORM\Entity
 */
class Pertenenciaetnica
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdPertenenciaEtnica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpertenenciaetnica;

    /**
     * @var string
     *
     * @ORM\Column(name="PertenenciaEtnica", type="string", length=40, nullable=false)
     */
    private $pertenenciaetnica;

    public function getIdpertenenciaetnica(): ?int
    {
        return $this->idpertenenciaetnica;
    }

    public function getPertenenciaetnica(): ?string
    {
        return $this->pertenenciaetnica;
    }

    public function setPertenenciaetnica(string $pertenenciaetnica): self
    {
        $this->pertenenciaetnica = $pertenenciaetnica;

        return $this;
    }


}
