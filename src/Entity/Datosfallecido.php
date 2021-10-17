<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datosfallecido
 *
 * @ORM\Table(name="datosfallecido", indexes={@ORM\Index(name="IdMunicipio", columns={"IdMunicipio"}), @ORM\Index(name="IdSitioDefuncion", columns={"IdSitioDefuncion"}), @ORM\Index(name="IdProbableManeraMuerte", columns={"IdProbableManeraMuerte"}), @ORM\Index(name="IdNombreArea", columns={"IdNombreArea"}), @ORM\Index(name="IdGrupoIndigena", columns={"IdGrupoIndigena"}), @ORM\Index(name="IdAdministradoraSeguridad", columns={"IdAdministradoraSeguridad"}), @ORM\Index(name="IdTipoDefuncion", columns={"IdTipoDefuncion"}), @ORM\Index(name="IdRegimenSeguridad", columns={"IdRegimenSeguridad"}), @ORM\Index(name="IdOcupacion", columns={"IdOcupacion"}), @ORM\Index(name="IdInstitucion", columns={"IdInstitucion"}), @ORM\Index(name="IdCausaDirecta", columns={"IdCausaDirecta"}), @ORM\Index(name="IdTipoDocumento", columns={"IdTipoDocumento"}), @ORM\Index(name="IdSexo", columns={"IdSexo"}), @ORM\Index(name="IdPertenenciaEtnica", columns={"IdPertenenciaEtnica"}), @ORM\Index(name="IdNivelEducativo", columns={"IdNivelEducativo"}), @ORM\Index(name="IdEstadoCivil", columns={"IdEstadoCivil"})})
 * @ORM\Entity
 */
class Datosfallecido
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdDatosFallecido", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddatosfallecido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaNacimientoFallecido", type="date", nullable=false)
     */
    private $fechanacimientofallecido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaDefuncion", type="date", nullable=false)
     */
    private $fechadefuncion;

    /**
     * @var \Administradoraseguridad
     *
     * @ORM\ManyToOne(targetEntity="Administradoraseguridad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdAdministradoraSeguridad", referencedColumnName="IdAdministradoraSeguridad")
     * })
     */
    private $idadministradoraseguridad;

    /**
     * @var \Probablemaneramuerte
     *
     * @ORM\ManyToOne(targetEntity="Probablemaneramuerte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdProbableManeraMuerte", referencedColumnName="IdProbableManeraMuerte")
     * })
     */
    private $idprobablemaneramuerte;

    /**
     * @var \Regimenseguridad
     *
     * @ORM\ManyToOne(targetEntity="Regimenseguridad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdRegimenSeguridad", referencedColumnName="IdRegimenSeguridad")
     * })
     */
    private $idregimenseguridad;

    /**
     * @var \Sexo
     *
     * @ORM\ManyToOne(targetEntity="Sexo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdSexo", referencedColumnName="IdSexo")
     * })
     */
    private $idsexo;

    /**
     * @var \Sitiodefuncion
     *
     * @ORM\ManyToOne(targetEntity="Sitiodefuncion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdSitioDefuncion", referencedColumnName="IdSitioDefuncion")
     * })
     */
    private $idsitiodefuncion;

    /**
     * @var \Tipodefuncion
     *
     * @ORM\ManyToOne(targetEntity="Tipodefuncion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdTipoDefuncion", referencedColumnName="IdTipoDefuncion")
     * })
     */
    private $idtipodefuncion;

    /**
     * @var \Tipodocumento
     *
     * @ORM\ManyToOne(targetEntity="Tipodocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdTipoDocumento", referencedColumnName="IdTipoDocumento")
     * })
     */
    private $idtipodocumento;

    /**
     * @var \Municipio
     *
     * @ORM\ManyToOne(targetEntity="Municipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdMunicipio", referencedColumnName="IdMunicipio")
     * })
     */
    private $idmunicipio;

    /**
     * @var \Causadirecta
     *
     * @ORM\ManyToOne(targetEntity="Causadirecta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdCausaDirecta", referencedColumnName="IdCausaDirecta")
     * })
     */
    private $idcausadirecta;

    /**
     * @var \Estadocivil
     *
     * @ORM\ManyToOne(targetEntity="Estadocivil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdEstadoCivil", referencedColumnName="IdEstadoCivil")
     * })
     */
    private $idestadocivil;

    /**
     * @var \Grupoindigena
     *
     * @ORM\ManyToOne(targetEntity="Grupoindigena")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdGrupoIndigena", referencedColumnName="IdGrupoIndigena")
     * })
     */
    private $idgrupoindigena;

    /**
     * @var \Institucion
     *
     * @ORM\ManyToOne(targetEntity="Institucion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdInstitucion", referencedColumnName="IdInstitucion")
     * })
     */
    private $idinstitucion;

    /**
     * @var \Niveleducativo
     *
     * @ORM\ManyToOne(targetEntity="Niveleducativo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdNivelEducativo", referencedColumnName="IdNivelEducativo")
     * })
     */
    private $idniveleducativo;

    /**
     * @var \Area
     *
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdNombreArea", referencedColumnName="IdArea")
     * })
     */
    private $idnombrearea;

    /**
     * @var \Ocupacion
     *
     * @ORM\ManyToOne(targetEntity="Ocupacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdOcupacion", referencedColumnName="IdOcupacion")
     * })
     */
    private $idocupacion;

    /**
     * @var \Pertenenciaetnica
     *
     * @ORM\ManyToOne(targetEntity="Pertenenciaetnica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdPertenenciaEtnica", referencedColumnName="IdPertenenciaEtnica")
     * })
     */
    private $idpertenenciaetnica;

    public function getIddatosfallecido(): ?int
    {
        return $this->iddatosfallecido;
    }

    public function getFechanacimientofallecido(): ?\DateTimeInterface
    {
        return $this->fechanacimientofallecido;
    }

    public function setFechanacimientofallecido(\DateTimeInterface $fechanacimientofallecido): self
    {
        $this->fechanacimientofallecido = $fechanacimientofallecido;

        return $this;
    }

    public function getFechadefuncion(): ?\DateTimeInterface
    {
        return $this->fechadefuncion;
    }

    public function setFechadefuncion(\DateTimeInterface $fechadefuncion): self
    {
        $this->fechadefuncion = $fechadefuncion;

        return $this;
    }

    public function getIdadministradoraseguridad(): ?Administradoraseguridad
    {
        return $this->idadministradoraseguridad;
    }

    public function setIdadministradoraseguridad(?Administradoraseguridad $idadministradoraseguridad): self
    {
        $this->idadministradoraseguridad = $idadministradoraseguridad;

        return $this;
    }

    public function getIdprobablemaneramuerte(): ?Probablemaneramuerte
    {
        return $this->idprobablemaneramuerte;
    }

    public function setIdprobablemaneramuerte(?Probablemaneramuerte $idprobablemaneramuerte): self
    {
        $this->idprobablemaneramuerte = $idprobablemaneramuerte;

        return $this;
    }

    public function getIdregimenseguridad(): ?Regimenseguridad
    {
        return $this->idregimenseguridad;
    }

    public function setIdregimenseguridad(?Regimenseguridad $idregimenseguridad): self
    {
        $this->idregimenseguridad = $idregimenseguridad;

        return $this;
    }

    public function getIdsexo(): ?Sexo
    {
        return $this->idsexo;
    }

    public function setIdsexo(?Sexo $idsexo): self
    {
        $this->idsexo = $idsexo;

        return $this;
    }

    public function getIdsitiodefuncion(): ?Sitiodefuncion
    {
        return $this->idsitiodefuncion;
    }

    public function setIdsitiodefuncion(?Sitiodefuncion $idsitiodefuncion): self
    {
        $this->idsitiodefuncion = $idsitiodefuncion;

        return $this;
    }

    public function getIdtipodefuncion(): ?Tipodefuncion
    {
        return $this->idtipodefuncion;
    }

    public function setIdtipodefuncion(?Tipodefuncion $idtipodefuncion): self
    {
        $this->idtipodefuncion = $idtipodefuncion;

        return $this;
    }

    public function getIdtipodocumento(): ?Tipodocumento
    {
        return $this->idtipodocumento;
    }

    public function setIdtipodocumento(?Tipodocumento $idtipodocumento): self
    {
        $this->idtipodocumento = $idtipodocumento;

        return $this;
    }

    public function getIdmunicipio(): ?Municipio
    {
        return $this->idmunicipio;
    }

    public function setIdmunicipio(?Municipio $idmunicipio): self
    {
        $this->idmunicipio = $idmunicipio;

        return $this;
    }

    public function getIdcausadirecta(): ?Causadirecta
    {
        return $this->idcausadirecta;
    }

    public function setIdcausadirecta(?Causadirecta $idcausadirecta): self
    {
        $this->idcausadirecta = $idcausadirecta;

        return $this;
    }

    public function getIdestadocivil(): ?Estadocivil
    {
        return $this->idestadocivil;
    }

    public function setIdestadocivil(?Estadocivil $idestadocivil): self
    {
        $this->idestadocivil = $idestadocivil;

        return $this;
    }

    public function getIdgrupoindigena(): ?Grupoindigena
    {
        return $this->idgrupoindigena;
    }

    public function setIdgrupoindigena(?Grupoindigena $idgrupoindigena): self
    {
        $this->idgrupoindigena = $idgrupoindigena;

        return $this;
    }

    public function getIdinstitucion(): ?Institucion
    {
        return $this->idinstitucion;
    }

    public function setIdinstitucion(?Institucion $idinstitucion): self
    {
        $this->idinstitucion = $idinstitucion;

        return $this;
    }

    public function getIdniveleducativo(): ?Niveleducativo
    {
        return $this->idniveleducativo;
    }

    public function setIdniveleducativo(?Niveleducativo $idniveleducativo): self
    {
        $this->idniveleducativo = $idniveleducativo;

        return $this;
    }

    public function getIdnombrearea(): ?Area
    {
        return $this->idnombrearea;
    }

    public function setIdnombrearea(?Area $idnombrearea): self
    {
        $this->idnombrearea = $idnombrearea;

        return $this;
    }

    public function getIdocupacion(): ?Ocupacion
    {
        return $this->idocupacion;
    }

    public function setIdocupacion(?Ocupacion $idocupacion): self
    {
        $this->idocupacion = $idocupacion;

        return $this;
    }

    public function getIdpertenenciaetnica(): ?Pertenenciaetnica
    {
        return $this->idpertenenciaetnica;
    }

    public function setIdpertenenciaetnica(?Pertenenciaetnica $idpertenenciaetnica): self
    {
        $this->idpertenenciaetnica = $idpertenenciaetnica;

        return $this;
    }


}
