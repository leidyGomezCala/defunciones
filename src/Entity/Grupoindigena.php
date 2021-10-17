<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupoindigena
 *
 * @ORM\Table(name="grupoindigena")
 * @ORM\Entity
 */
class Grupoindigena
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdGrupoIndigena", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgrupoindigena;

    /**
     * @var string
     *
     * @ORM\Column(name="GrupoIndigena", type="string", length=50, nullable=false)
     */
    private $grupoindigena;

    public function getIdgrupoindigena(): ?int
    {
        return $this->idgrupoindigena;
    }

    public function getGrupoindigena(): ?string
    {
        return $this->grupoindigena;
    }

    public function setGrupoindigena(string $grupoindigena): self
    {
        $this->grupoindigena = $grupoindigena;

        return $this;
    }


}
