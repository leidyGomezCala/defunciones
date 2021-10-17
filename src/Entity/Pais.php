<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="pais")
 * @ORM\Entity
 */
class Pais
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdPais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpais;

    /**
     * @var string
     *
     * @ORM\Column(name="NombrePais", type="string", length=30, nullable=false)
     */
    private $nombrepais;

    public function getIdpais(): ?int
    {
        return $this->idpais;
    }

    public function getNombrepais(): ?string
    {
        return $this->nombrepais;
    }

    public function setNombrepais(string $nombrepais): self
    {
        $this->nombrepais = $nombrepais;

        return $this;
    }


}
