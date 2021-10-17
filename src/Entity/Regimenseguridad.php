<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regimenseguridad
 *
 * @ORM\Table(name="regimenseguridad")
 * @ORM\Entity
 */
class Regimenseguridad
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdRegimenSeguridad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idregimenseguridad;

    /**
     * @var string
     *
     * @ORM\Column(name="RegimenSeguridad", type="string", length=30, nullable=false)
     */
    private $regimenseguridad;

    public function getIdregimenseguridad(): ?int
    {
        return $this->idregimenseguridad;
    }

    public function getRegimenseguridad(): ?string
    {
        return $this->regimenseguridad;
    }

    public function setRegimenseguridad(string $regimenseguridad): self
    {
        $this->regimenseguridad = $regimenseguridad;

        return $this;
    }


}
