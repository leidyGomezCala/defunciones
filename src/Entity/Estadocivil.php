<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estadocivil
 *
 * @ORM\Table(name="estadocivil")
 * @ORM\Entity
 */
class Estadocivil
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdEstadoCivil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idestadocivil;

    /**
     * @var string
     *
     * @ORM\Column(name="EstadoCivil", type="string", length=70, nullable=false)
     */
    private $estadocivil;

    public function getIdestadocivil(): ?int
    {
        return $this->idestadocivil;
    }

    public function getEstadocivil(): ?string
    {
        return $this->estadocivil;
    }

    public function setEstadocivil(string $estadocivil): self
    {
        $this->estadocivil = $estadocivil;

        return $this;
    }


}
