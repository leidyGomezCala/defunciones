<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administradoraseguridad
 *
 * @ORM\Table(name="administradoraseguridad")
 * @ORM\Entity
 */
class Administradoraseguridad
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdAdministradoraSeguridad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadministradoraseguridad;

    /**
     * @var string
     *
     * @ORM\Column(name="NombreAdministradora", type="string", length=100, nullable=false)
     */
    private $nombreadministradora;

    public function getIdadministradoraseguridad(): ?int
    {
        return $this->idadministradoraseguridad;
    }

    public function getNombreadministradora(): ?string
    {
        return $this->nombreadministradora;
    }

    public function setNombreadministradora(string $nombreadministradora): self
    {
        $this->nombreadministradora = $nombreadministradora;

        return $this;
    }


}
