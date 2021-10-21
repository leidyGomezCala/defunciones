<?php

namespace App\Repository;

use Doctrine\DBAL\Driver\Connection;
use App\Entity\Datosfallecido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DriverManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method DatosfallecidoRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatosfallecidoRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatosfallecidoRepository[]    findAll()
 * @method DatosfallecidoRepository[]    searchDatosFallecidos()
 * @method DatosfallecidoRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatosfallecidoRepository extends ServiceEntityRepository
{
    const CONNECTIONPARAMS = array(
        'dbname' => 'defunciones',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    );
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Datosfallecido::class);
    }

    /*
    *  @return Datosfallecido[]
    */

    public function showDataFallecidos($id){
        $arrDatos = array();
        $conn = DriverManager::getConnection(DatosfallecidoRepository::CONNECTIONPARAMS);
        $sql = 'SELECT dp.IdDatosFallecido as id_fallecido, round(datediff(FechaDefuncion,FechaNacimientoFallecido)/365)as edad, caudir.CausaDirecta as Causa_directa, probmanmuer.ProbableManeraMuerte as Causa_probable, tipodef.TipoDefuncion as tipo_defuncion, inst.NombreInstitucion as institucion, sitiodef.SitioDefuncion as sitio_defuncion, sexo.Sexo as genero, mun.NombreMunicipio as municipio, ar.NombreArea as area, tipoDoc.TipoDocumento as tipo_documento, estcivil.EstadoCivil as estado_civil, niveledu.NivelEducativo as nivel_educativo, ocu.Ocupacion as ocupacion,  regseg.RegimenSeguridad as regimen_seguridad, adminseg.NombreAdministradora as administradora, pertetnica.PertenenciaEtnica as pertenecia_etnica, grupoind.GrupoIndigena as grupo_indigena
        FROM datosfallecido dp
        INNER JOIN administradoraseguridad adminseg on dp.IdAdministradoraSeguridad = adminseg.IdAdministradoraSeguridad
        INNER JOIN tipodocumento tipoDoc on dp.IdTipoDocumento = tipoDoc.IdTipoDocumento
        INNER JOIN sexo sexo on dp.IdSexo = sexo.IdSexo
        INNER JOIN municipio mun on dp.IdMunicipio = mun.IdMunicipio
        INNER JOIN area ar on dp.IdNombreArea = ar.IdArea
        INNER JOIN estadocivil estcivil on dp.IdEstadoCivil = estcivil.IdEstadoCivil
        INNER JOIN niveleducativo niveledu on dp.IdNivelEducativo  = niveledu.IdNivelEducativo 
        INNER JOIN sitiodefuncion sitiodef on dp.IdSitioDefuncion  = sitiodef.IdSitioDefuncion 
        INNER JOIN tipodefuncion tipodef on dp.IdTipoDefuncion  = tipodef.IdTipoDefuncion 
        INNER JOIN institucion inst on dp.IdInstitucion  = inst.IdInstitucion 
        INNER JOIN probablemaneramuerte probmanmuer on dp.IdProbableManeraMuerte  = probmanmuer.IdProbableManeraMuerte 
        INNER JOIN causadirecta caudir on dp.IdCausaDirecta  = caudir.IdCausaDirecta 
        INNER JOIN ocupacion ocu on dp.IdOcupacion  = ocu.IdOcupacion 
        INNER JOIN regimenseguridad regseg on dp.IdRegimenSeguridad  = regseg.IdRegimenSeguridad 
        INNER JOIN pertenenciaetnica pertetnica on dp.IdPertenenciaEtnica  = pertetnica.IdPertenenciaEtnica 
        INNER JOIN grupoindigena grupoind on dp.IdGrupoIndigena  = grupoind.IdGrupoIndigena
        WHERE dp.IdDatosFallecido = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$id);       
        $result = $stmt->executeQuery();
        foreach ($result->fetchAllAssociative() as $row) {
            array_push($arrDatos, $row);
        }
        return $arrDatos;
    }

    public function findByDatosFallecidos()
    {
        $arrDatos = array();
        $conn = DriverManager::getConnection(DatosfallecidoRepository::CONNECTIONPARAMS);
        $sql = 'SELECT dp.IdDatosFallecido as id_fallecido, round(datediff(FechaDefuncion,FechaNacimientoFallecido)/365)as edad, caudir.CausaDirecta as Causa_directa, tipodef.TipoDefuncion as tipo_defuncion, inst.NombreInstitucion as institucion, sitiodef.SitioDefuncion as sitio_defuncion, sexo.Sexo as genero, mun.NombreMunicipio as municipio, adminseg.NombreAdministradora as administradora
        FROM datosfallecido dp
        INNER JOIN administradoraseguridad adminseg on dp.IdAdministradoraSeguridad = adminseg.IdAdministradoraSeguridad
        INNER JOIN sexo sexo on dp.IdSexo = sexo.IdSexo
        INNER JOIN municipio mun on dp.IdMunicipio = mun.IdMunicipio
        INNER JOIN sitiodefuncion sitiodef on dp.IdSitioDefuncion  = sitiodef.IdSitioDefuncion 
        INNER JOIN tipodefuncion tipodef on dp.IdTipoDefuncion  = tipodef.IdTipoDefuncion 
        INNER JOIN institucion inst on dp.IdInstitucion  = inst.IdInstitucion 
        INNER JOIN causadirecta caudir on dp.IdCausaDirecta  = caudir.IdCausaDirecta';
        $stmt = $conn->prepare($sql);        
        $result = $stmt->executeQuery();
        foreach ($result->fetchAllAssociative() as $row) {
            array_push($arrDatos, $row);
        }
        return $arrDatos;
    }

    public function findByDatosFallecidosByMun($idmunicipio)
    {
        $arrDatos = array();
        $conn = DriverManager::getConnection(DatosfallecidoRepository::CONNECTIONPARAMS);
        $sql = 'SELECT dp.IdDatosFallecido as id_fallecido, round(datediff(FechaDefuncion,FechaNacimientoFallecido)/365)as edad, caudir.CausaDirecta as Causa_directa, tipodef.TipoDefuncion as tipo_defuncion, inst.NombreInstitucion as institucion, sitiodef.SitioDefuncion as sitio_defuncion, sexo.Sexo as genero, mun.NombreMunicipio as municipio, adminseg.NombreAdministradora as administradora
        FROM datosfallecido dp
        INNER JOIN administradoraseguridad adminseg on dp.IdAdministradoraSeguridad = adminseg.IdAdministradoraSeguridad
        INNER JOIN sexo sexo on dp.IdSexo = sexo.IdSexo
        INNER JOIN municipio mun on dp.IdMunicipio = mun.IdMunicipio
        INNER JOIN sitiodefuncion sitiodef on dp.IdSitioDefuncion  = sitiodef.IdSitioDefuncion 
        INNER JOIN tipodefuncion tipodef on dp.IdTipoDefuncion  = tipodef.IdTipoDefuncion 
        INNER JOIN institucion inst on dp.IdInstitucion  = inst.IdInstitucion 
        INNER JOIN causadirecta caudir on dp.IdCausaDirecta  = caudir.IdCausaDirecta
        WHERE mun.IdMunicipio = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$idmunicipio);       
        $result = $stmt->executeQuery();
        foreach ($result->fetchAllAssociative() as $row) {
            array_push($arrDatos, $row);
        }
        return $arrDatos;
    }
    // /**
    //  * @return DatosfallecidoRepository[] Returns an array of DatosfallecidoRepository objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DatosfallecidoRepository
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
