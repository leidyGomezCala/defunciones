<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Probablemaneramuerte
 *
 * @ORM\Table(name="probablemaneramuerte")
 * @ORM\Entity
 */
class Probablemaneramuerte
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdProbableManeraMuerte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprobablemaneramuerte;

    /**
     * @var string
     *
     * @ORM\Column(name="ProbableManeraMuerte", type="string", length=50, nullable=false)
     */
    private $probablemaneramuerte;

    public function getIdprobablemaneramuerte(): ?int
    {
        return $this->idprobablemaneramuerte;
    }

    public function getProbablemaneramuerte(): ?string
    {
        return $this->probablemaneramuerte;
    }

    public function setProbablemaneramuerte(string $probablemaneramuerte): self
    {
        $this->probablemaneramuerte = $probablemaneramuerte;

        return $this;
    }


}
