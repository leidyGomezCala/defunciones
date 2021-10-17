<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento", indexes={@ORM\Index(name="IdPais", columns={"IdPais"})})
 * @ORM\Entity
 */
class Departamento
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdDepartamento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="NombreDepartamento", type="string", length=30, nullable=false)
     */
    private $nombredepartamento;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdPais", referencedColumnName="IdPais")
     * })
     */
    private $idpais;

    public function getIddepartamento(): ?int
    {
        return $this->iddepartamento;
    }

    public function getNombredepartamento(): ?string
    {
        return $this->nombredepartamento;
    }

    public function setNombredepartamento(string $nombredepartamento): self
    {
        $this->nombredepartamento = $nombredepartamento;

        return $this;
    }

    public function getIdpais(): ?Pais
    {
        return $this->idpais;
    }

    public function setIdpais(?Pais $idpais): self
    {
        $this->idpais = $idpais;

        return $this;
    }


}
