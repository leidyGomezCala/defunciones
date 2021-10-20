<?php

namespace App\Entity;

use App\Repository\DatosfallecidoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DatosfallecidoRepository::class)
 * Datosfallecido
 * @ORM\Table(name="datosfallecido", indexes={@ORM\Index(name="IdMunicipio", columns={"IdMunicipio"}), @ORM\Index(name="IdSitioDefuncion", columns={"IdSitioDefuncion"}), @ORM\Index(name="IdProbableManeraMuerte", columns={"IdProbableManeraMuerte"}), @ORM\Index(name="IdNombreArea", columns={"IdNombreArea"}), @ORM\Index(name="IdGrupoIndigena", columns={"IdGrupoIndigena"}), @ORM\Index(name="IdAdministradoraSeguridad", columns={"IdAdministradoraSeguridad"}), @ORM\Index(name="IdTipoDefuncion", columns={"IdTipoDefuncion"}), @ORM\Index(name="IdRegimenSeguridad", columns={"IdRegimenSeguridad"}), @ORM\Index(name="IdOcupacion", columns={"IdOcupacion"}), @ORM\Index(name="IdInstitucion", columns={"IdInstitucion"}), @ORM\Index(name="IdCausaDirecta", columns={"IdCausaDirecta"}), @ORM\Index(name="IdTipoDocumento", columns={"IdTipoDocumento"}), @ORM\Index(name="IdSexo", columns={"IdSexo"}), @ORM\Index(name="IdPertenenciaEtnica", columns={"IdPertenenciaEtnica"}), @ORM\Index(name="IdNivelEducativo", columns={"IdNivelEducativo"}), @ORM\Index(name="IdEstadoCivil", columns={"IdEstadoCivil"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Datosfallecido 
{

    const SELECTFIELD = array(
        0 => [
            'label' => 'Nombre Administradora Seguridad',
            'field' => 'idadministradoraseguridad',
            'class' => Administradoraseguridad::class,
            'expanded' => false,
            'multiple' => false,
        ],
        1 => [
            'label' => 'Sitio Defunción',
            'field' => 'idsitiodefuncion',
            'class' => Sitiodefuncion::class,
            'expanded' => false,
            'multiple' => false,
        ],
        2 => [
            'label' => 'Nombre Institución',
            'field' => 'idinstitucion',
            'class' => Institucion::class,
            'expanded' => false,
            'multiple' => false,
        ],
        3 => [
            'label' => 'Tipo Documento',
            'field' => 'idtipodocumento',
            'class' => Tipodocumento::class,
            'expanded' => false,
            'multiple' => false,
        ],
        4 => [
            'label' => 'Municipio Residencia',
            'field' => 'idmunicipio',
            'class' => Municipio::class,
            'expanded' => false,
            'multiple' => false,
        ],
        5 => [
            'label' => 'Estado Civil Fallecido',
            'field' => 'idestadocivil',
            'class' => Estadocivil::class,
            'expanded' => false,
            'multiple' => false,
        ],
        6 => [
            'label' => 'Ocupación',
            'field' => 'idocupacion',
            'class' => Ocupacion::class,
            'expanded' => false,
            'multiple' => false,
        ],
        7 => [
            'label' => 'Causa Directa de Muerte',
            'field' => 'idcausadirecta',
            'class' => Causadirecta::class,
            'expanded' => false,
            'multiple' => false,
        ],
        8 => [
            'label' => 'Causa Probable de Muerte',
            'field' => 'idprobablemaneramuerte',
            'class' => Probablemaneramuerte::class,
            'expanded' => false,
            'multiple' => false,
        ],
        9 => [
            'label' => 'Nivel Académico',
            'field' => 'idniveleducativo',
            'class' => Niveleducativo::class,
            'expanded' => false,
            'multiple' => false,
        ],
        10 => [
            'label' => 'Aréa Residencia',
            'field' => 'IdNombreArea',
            'class' => Area::class,
            'expanded' => true,
            'multiple' => false,
        ],
        11 => [
            'label' => 'Tipo Defunción',
            'field' => 'idtipodefuncion',
            'class' => Tipodefuncion::class,
            'expanded' => true,
            'multiple' => false,
        ],
        12 => [
            'label' => 'Género Fallecido',
            'field' => 'idsexo',
            'class' => Sexo::class,
            'expanded' => true,
            'multiple' => false,
        ],
        13 => [
            'label' => 'Régimen de seguridad',
            'field' => 'idregimenseguridad',
            'class' => Regimenseguridad::class,
            'expanded' => true,
            'multiple' => false,
        ],
        14 => [
            'label' => '¿Pertenece a alguna etnia?',
            'field' => 'idpertenenciaetnica',
            'class' => Pertenenciaetnica::class,
            'expanded' => true,
            'multiple' => false,
        ],
        15 => [
            'label' => '¿Pertenece a algún grupo indígena?',
            'field' => 'idgrupoindigena',
            'class' => Grupoindigena::class,
            'expanded' => true,
            'multiple' => false,
        ]
    );


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
     * @ORM\Column(name="IdAdministradoraSeguridad", type="integer", length=11, nullable=false)
     */
    private $idadministradoraseguridad;

    /**
     * @ORM\Column(name="IdProbableManeraMuerte", type="integer", length=11, nullable=false)
     */
    private $idprobablemaneramuerte;

    /**
     * @ORM\Column(name="IdRegimenSeguridad", type="integer", length=11, nullable=false)
     */
    private $idregimenseguridad;

    /**
     * @ORM\Column(name="IdSexo", type="integer", length=11, nullable=false)
     */
    private $idsexo;

    /**
     * @ORM\Column(name="IdSitioDefuncion", type="integer", length=11, nullable=false)
     */
    private $idsitiodefuncion;

    /**
     * @ORM\Column(name="IdTipoDefuncion", type="integer", length=11, nullable=false)
     */
    private $idtipodefuncion;

    /**
     * @ORM\Column(name="IdTipoDocumento", type="integer", length=11, nullable=false)
     */
    private $idtipodocumento;

    /**
     * @ORM\Column(name="IdMunicipio", type="integer", length=11, nullable=false)
     */
    private $idmunicipio;

    /**
     * @ORM\Column(name="IdCausaDirecta", type="integer", length=11, nullable=false)
     */
    private $idcausadirecta;

    /**
     * @ORM\Column(name="IdEstadoCivil", type="integer", length=11, nullable=false)
     */
    private $idestadocivil;

    /**
     * @ORM\Column(name="IdGrupoIndigena", type="integer", length=11, nullable=false)
     */
    private $idgrupoindigena;

    /**
     * @ORM\Column(name="IdInstitucion", type="integer", length=11, nullable=false)
     */
    private $idinstitucion;

    /**
     * @ORM\Column(name="IdNivelEducativo", type="integer", length=11, nullable=false)
     */
    private $idniveleducativo;

    /**
     * @ORM\Column(name="IdNombreArea", type="integer", length=11, nullable=false)
     */
    private $idnombrearea;

    /**
     * @ORM\Column(name="IdOcupacion", type="integer", length=11, nullable=false)
     */
    private $idocupacion;

    /**
     * @ORM\Column(name="IdPertenenciaEtnica", type="integer", length=11, nullable=false)
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

    public function getIdadministradoraseguridad(): ?int
    {
        return $this->idadministradoraseguridad;
    }

    public function setIdadministradoraseguridad(int $idadministradoraseguridad): self
    {
        $this->idadministradoraseguridad = $idadministradoraseguridad;

        return $this;
    }

    public function getIdprobablemaneramuerte(): ?int
    {
        return $this->idprobablemaneramuerte;
    }

    public function setIdprobablemaneramuerte(int $idprobablemaneramuerte): self
    {
        $this->idprobablemaneramuerte = $idprobablemaneramuerte;

        return $this;
    }

    public function getIdregimenseguridad(): ?int
    {
        return $this->idregimenseguridad;
    }

    public function setIdregimenseguridad(int $idregimenseguridad): self
    {
        $this->idregimenseguridad = $idregimenseguridad;

        return $this;
    }

    public function getIdsexo(): ?int
    {
        return $this->idsexo;
    }

    public function setIdsexo(int $idsexo): self
    {
        $this->idsexo = $idsexo;

        return $this;
    }

    public function getIdsitiodefuncion(): ?int
    {
        return $this->idsitiodefuncion;
    }

    public function setIdsitiodefuncion(int $idsitiodefuncion): self
    {
        $this->idsitiodefuncion = $idsitiodefuncion;

        return $this;
    }

    public function getIdtipodefuncion(): ?int
    {
        return $this->idtipodefuncion;
    }

    public function setIdtipodefuncion(int $idtipodefuncion): self
    {
        $this->idtipodefuncion = $idtipodefuncion;

        return $this;
    }

    public function getIdtipodocumento(): ?int
    {
        return $this->idtipodocumento;
    }

    public function setIdtipodocumento(int $idtipodocumento): self
    {
        $this->idtipodocumento = $idtipodocumento;

        return $this;
    }

    public function getIdmunicipio(): ?int
    {
        return $this->idmunicipio;
    }

    public function setIdmunicipio(int $idmunicipio): self
    {
        $this->idmunicipio = $idmunicipio;

        return $this;
    }

    public function getIdcausadirecta(): ?int
    {
        return $this->idcausadirecta;
    }

    public function setIdcausadirecta(int $idcausadirecta): self
    {
        $this->idcausadirecta = $idcausadirecta;

        return $this;
    }

    public function getIdestadocivil(): ?int
    {
        return $this->idestadocivil;
    }

    public function setIdestadocivil(int $idestadocivil): self
    {
        $this->idestadocivil = $idestadocivil;

        return $this;
    }

    public function getIdgrupoindigena(): ?int
    {
        return $this->idgrupoindigena;
    }

    public function setIdgrupoindigena(int $idgrupoindigena): self
    {
        $this->idgrupoindigena = $idgrupoindigena;

        return $this;
    }

    public function getIdinstitucion(): ?int
    {
        return $this->idinstitucion;
    }

    public function setIdinstitucion(int $idinstitucion): self
    {
        $this->idinstitucion = $idinstitucion;

        return $this;
    }

    public function getIdniveleducativo(): ?int
    {
        return $this->idniveleducativo;
    }

    public function setIdniveleducativo(int $idniveleducativo): self
    {
        $this->idniveleducativo = $idniveleducativo;

        return $this;
    }

    public function getIdnombrearea(): ?int
    {
        return $this->idnombrearea;
    }

    public function setIdnombrearea(int $idnombrearea): self
    {
        $this->idnombrearea = $idnombrearea;

        return $this;
    }

    public function getIdocupacion(): ?int
    {
        return $this->idocupacion;
    }

    public function setIdocupacion(int $idocupacion): self
    {
        $this->idocupacion = $idocupacion;

        return $this;
    }

    public function getIdpertenenciaetnica(): ?int
    {
        return $this->idpertenenciaetnica;
    }

    public function setIdpertenenciaetnica(int $idpertenenciaetnica): self
    {
        $this->idpertenenciaetnica = $idpertenenciaetnica;

        return $this;
    }





}
