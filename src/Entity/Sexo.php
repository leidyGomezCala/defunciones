<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sexo
 *
 * @ORM\Table(name="sexo")
 * @ORM\Entity
 */
class Sexo
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdSexo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsexo;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string", length=30, nullable=false)
     */
    private $sexo;

    public function getIdsexo(): ?int
    {
        return $this->idsexo;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }


}
