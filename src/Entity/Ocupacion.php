<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ocupacion
 *
 * @ORM\Table(name="ocupacion")
 * @ORM\Entity
 */
class Ocupacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdOcupacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idocupacion;

    /**
     * @var string
     *
     * @ORM\Column(name="Ocupacion", type="string", length=100, nullable=false)
     */
    private $ocupacion;

    public function getIdocupacion(): ?int
    {
        return $this->idocupacion;
    }

    public function getOcupacion(): ?string
    {
        return $this->ocupacion;
    }

    public function setOcupacion(string $ocupacion): self
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }


}
