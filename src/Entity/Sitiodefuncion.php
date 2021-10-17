<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sitiodefuncion
 *
 * @ORM\Table(name="sitiodefuncion")
 * @ORM\Entity
 */
class Sitiodefuncion
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdSitioDefuncion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsitiodefuncion;

    /**
     * @var string
     *
     * @ORM\Column(name="SitioDefuncion", type="string", length=30, nullable=false)
     */
    private $sitiodefuncion;

    public function getIdsitiodefuncion(): ?int
    {
        return $this->idsitiodefuncion;
    }

    public function getSitiodefuncion(): ?string
    {
        return $this->sitiodefuncion;
    }

    public function setSitiodefuncion(string $sitiodefuncion): self
    {
        $this->sitiodefuncion = $sitiodefuncion;

        return $this;
    }


}
