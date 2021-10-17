<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table(name="area")
 * @ORM\Entity
 */
class Area
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdArea", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarea;

    /**
     * @var string
     *
     * @ORM\Column(name="NombreArea", type="string", length=30, nullable=false)
     */
    private $nombrearea;

    public function getIdarea(): ?int
    {
        return $this->idarea;
    }

    public function getNombrearea(): ?string
    {
        return $this->nombrearea;
    }

    public function setNombrearea(string $nombrearea): self
    {
        $this->nombrearea = $nombrearea;

        return $this;
    }


}
