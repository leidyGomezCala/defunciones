<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Niveleducativo
 *
 * @ORM\Table(name="niveleducativo")
 * @ORM\Entity
 */
class Niveleducativo
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdNivelEducativo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idniveleducativo;

    /**
     * @var string
     *
     * @ORM\Column(name="NivelEducativo", type="string", length=30, nullable=false)
     */
    private $niveleducativo;

    public function getIdniveleducativo(): ?int
    {
        return $this->idniveleducativo;
    }

    public function getNiveleducativo(): ?string
    {
        return $this->niveleducativo;
    }

    public function setNiveleducativo(string $niveleducativo): self
    {
        $this->niveleducativo = $niveleducativo;

        return $this;
    }


}
