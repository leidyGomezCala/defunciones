<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Causadirecta
 *
 * @ORM\Table(name="causadirecta")
 * @ORM\Entity
 */
class Causadirecta
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdCausaDirecta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcausadirecta;

    /**
     * @var string
     *
     * @ORM\Column(name="CausaDirecta", type="string", length=50, nullable=false)
     */
    private $causadirecta;

    public function getIdcausadirecta(): ?int
    {
        return $this->idcausadirecta;
    }

    public function getCausadirecta(): ?string
    {
        return $this->causadirecta;
    }

    public function setCausadirecta(string $causadirecta): self
    {
        $this->causadirecta = $causadirecta;

        return $this;
    }


}
