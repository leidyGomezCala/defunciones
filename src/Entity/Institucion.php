<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institucion
 *
 * @ORM\Table(name="institucion")
 * @ORM\Entity
 */
class Institucion
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdInstitucion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinstitucion;

    /**
     * @var string
     *
     * @ORM\Column(name="CodInstitucion", type="string", length=13, nullable=false)
     */
    private $codinstitucion;

    /**
     * @var string
     *
     * @ORM\Column(name="NombreInstitucion", type="string", length=50, nullable=false)
     */
    private $nombreinstitucion;

    public function getIdinstitucion(): ?int
    {
        return $this->idinstitucion;
    }

    public function getCodinstitucion(): ?string
    {
        return $this->codinstitucion;
    }

    public function setCodinstitucion(string $codinstitucion): self
    {
        $this->codinstitucion = $codinstitucion;

        return $this;
    }

    public function getNombreinstitucion(): ?string
    {
        return $this->nombreinstitucion;
    }

    public function setNombreinstitucion(string $nombreinstitucion): self
    {
        $this->nombreinstitucion = $nombreinstitucion;

        return $this;
    }


}
