<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipodefuncion
 *
 * @ORM\Table(name="tipodefuncion")
 * @ORM\Entity
 */
class Tipodefuncion
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdTipoDefuncion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipodefuncion;

    /**
     * @var string
     *
     * @ORM\Column(name="TipoDefuncion", type="string", length=30, nullable=false)
     */
    private $tipodefuncion;

    public function getIdtipodefuncion(): ?int
    {
        return $this->idtipodefuncion;
    }

    public function getTipodefuncion(): ?string
    {
        return $this->tipodefuncion;
    }

    public function setTipodefuncion(string $tipodefuncion): self
    {
        $this->tipodefuncion = $tipodefuncion;

        return $this;
    }


}
