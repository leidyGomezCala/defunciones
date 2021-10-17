<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipodocumento
 *
 * @ORM\Table(name="tipodocumento")
 * @ORM\Entity
 */
class Tipodocumento
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdTipoDocumento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipodocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="TipoDocumento", type="string", length=30, nullable=false)
     */
    private $tipodocumento;

    public function getIdtipodocumento(): ?int
    {
        return $this->idtipodocumento;
    }

    public function getTipodocumento(): ?string
    {
        return $this->tipodocumento;
    }

    public function setTipodocumento(string $tipodocumento): self
    {
        $this->tipodocumento = $tipodocumento;

        return $this;
    }


}
