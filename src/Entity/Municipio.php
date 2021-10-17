<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipio
 *
 * @ORM\Table(name="municipio", indexes={@ORM\Index(name="IdDepartamento", columns={"IdDepartamento"})})
 * @ORM\Entity
 */
class Municipio
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdMunicipio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="NombreMunicipio", type="string", length=30, nullable=false)
     */
    private $nombremunicipio;

    /**
     * @var \Departamento
     *
     * @ORM\ManyToOne(targetEntity="Departamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdDepartamento", referencedColumnName="IdDepartamento")
     * })
     */
    private $iddepartamento;

    public function getIdmunicipio(): ?int
    {
        return $this->idmunicipio;
    }

    public function getNombremunicipio(): ?string
    {
        return $this->nombremunicipio;
    }

    public function setNombremunicipio(string $nombremunicipio): self
    {
        $this->nombremunicipio = $nombremunicipio;

        return $this;
    }

    public function getIddepartamento(): ?Departamento
    {
        return $this->iddepartamento;
    }

    public function setIddepartamento(?Departamento $iddepartamento): self
    {
        $this->iddepartamento = $iddepartamento;

        return $this;
    }


}
