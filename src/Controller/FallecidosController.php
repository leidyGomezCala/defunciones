<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Datosfallecido;
use App\Repository\DatosfallecidoRepository;
use App\Entity\Administradoraseguridad;
use App\Entity\Sitiodefuncion;
use App\Entity\Institucion;
use App\Entity\Tipodocumento;
use App\Entity\Municipio;
use App\Entity\Estadocivil;
use App\Entity\Ocupacion;
use App\Entity\Causadirecta;
use App\Entity\Probablemaneramuerte;
use App\Entity\Niveleducativo;
use App\Form\FallecidoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FallecidosController extends AbstractController
{

    
    /**
     * @Route("/", name="fallecidos")
     */
    public function index(Request $request, DatosfallecidoRepository $datosfallecidoRepository): Response
    {
        $getTime = time();
        $fallecidos = $datosfallecidoRepository->findByDatosFallecidos();$fallecidos = $datosfallecidoRepository->findByDatosFallecidos();
        $getTime = time() - $getTime;
        return $this->render('fallecidos/index.html.twig',[
            'fallecidos' => $fallecidos,
            'duration' => $getTime
        ]);
    }
    /*
    * @Route("/fallecidos/{id}", name="verFallecido")
    */
    public function showById(Request $request, int $id, DatosfallecidoRepository $datosfallecidoRepository)
    {
        $fallecido = $datosfallecidoRepository->showDataFallecidos($id);
        return $this->render('fallecidos/show.html.twig',[
            'fallecido' => $fallecido,
        ]);
    }
    /*
    * @Route("/editFallecido/{id}", name="verFallecido")
    */

    public function editFallecido(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $objFallecido = new Datosfallecido();
        $formFallecido = $this->createForm(FallecidoType::class, $objFallecido);
        $objFallecido = $em->getRepository(Datosfallecido::class)->find($id);

        //$fallecido = $datosfallecidoRepository->showDataFallecidos($id);

        $this->arrFields($em, $formFallecido);
        $this->addField($formFallecido, 'Editar', SubmitType::class, []);
        $this->fillForm($formFallecido,$objFallecido);
        $formFallecido->handleRequest($request);
        if($formFallecido->isSubmitted() && $formFallecido->isValid()){
            $this->registerDeath($em, $formFallecido, $objFallecido);
            return $this->redirectToRoute('fallecidos');
        }

        return $this->render('fallecidos/edit.html.twig',[
            'formulario' => $formFallecido->createView()
        ]);
    }
    /**
     * @Route("/registroFallecido", name="registroFallecido")
     */
    public function registerDeceased(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $fallecido = new Datosfallecido();

        $formFallecido = $this->createForm(FallecidoType::class, $fallecido);
        $this->arrFields($em, $formFallecido);
        $this->addField($formFallecido, 'Registrar', SubmitType::class, []);

        $formFallecido->handleRequest($request);
        if ($formFallecido->isSubmitted()) {
            $this->registerDeath($em, $formFallecido, $fallecido);
            return $this->redirectToRoute('fallecidos');
        }

        return $this->render('fallecidos/registro.html.twig',            [
            'formulario' => $formFallecido->createView()
        ]);
    }

    public function registerDeath($em, $form, $fallecido)
    {
        $this->setValue($form, $fallecido);
        $em->persist($fallecido);
        $em->flush();
        //$this->addFlash('exito', 'Defunción registrada');
    }

    public function setValue($form, $fallecido)
    {
        $fallecido->setFechanacimientofallecido($form['fechanacimientofallecido']->getData());
        $fallecido->setFechadefuncion($form['fechadefuncion']->getData());
        $fallecido->setIdadministradoraseguridad($form['idadministradoraseguridad']->getData());
        $fallecido->setIdprobablemaneramuerte($form['idprobablemaneramuerte']->getData());
        $fallecido->setIdsitiodefuncion($form['idsitiodefuncion']->getData());
        $fallecido->setIdocupacion($form['idocupacion']->getData());
        $fallecido->setIdtipodocumento($form['idtipodocumento']->getData());
        $fallecido->setIdmunicipio($form['idmunicipio']->getData());
        $fallecido->setIdcausadirecta($form['idcausadirecta']->getData());
        $fallecido->setIdestadocivil($form['idestadocivil']->getData());
        $fallecido->setIdinstitucion($form['idinstitucion']->getData());
        $fallecido->setIdniveleducativo($form['idniveleducativo']->getData());
        $fallecido->setIdsexo($form['idsexo']->getData());
        $fallecido->setIdtipodefuncion($form['idtipodefuncion']->getData());
        $fallecido->setIdnombrearea($form['IdNombreArea']->getData());
        $fallecido->setIdregimenseguridad($form['idregimenseguridad']->getData());
        $fallecido->setIdpertenenciaetnica($form['idpertenenciaetnica']->getData());
        $fallecido->setIdgrupoindigena($form['idgrupoindigena']->getData());
    }

    public function arrFields($em, $form)
    {
        for ($i = 0; $i < count(Datosfallecido::SELECTFIELD); $i++) {
            $this->fillSelector($em, $form, Datosfallecido::SELECTFIELD[$i]['class'], Datosfallecido::SELECTFIELD[$i]['label'], Datosfallecido::SELECTFIELD[$i]['field'], Datosfallecido::SELECTFIELD[$i]['expanded'], Datosfallecido::SELECTFIELD[$i]['multiple']);
        }
    }

    public function fillSelector($em,  $form, $class, $label, $field, $expanded, $multiple)
    {
        $queryData = $em->getRepository($class)->findAll();
        if($field == 'idmunicipio') $queryData = $em->getRepository(Municipio::class)->findBy(['iddepartamento' => 1]);
        $arrOptions = $this->arrOptions($label, $expanded, $multiple);
        for ($i = 0; $i < count($queryData); $i++) {
            $arrOptions['choices'] += $this->selectField($field, $queryData, $i);
        }
        $this->addField($form, $field, ChoiceType::class, $arrOptions);
    }

    public function selectField($field, $queryData, $i)
    {
        switch ($field) {
            case 'idadministradoraseguridad':
                return [(string)$queryData[$i]->getNombreadministradora() => $queryData[$i]->getIdadministradoraseguridad()];
                break;
            case 'idsitiodefuncion':
                return [(string)$queryData[$i]->getSitiodefuncion() => $queryData[$i]->getIdsitiodefuncion()];
                break;
            case 'idinstitucion':
                return [(string) $queryData[$i]->getNombreinstitucion() => $queryData[$i]->getIdinstitucion()];
                break;
            case 'idtipodocumento':
                return [(string) $queryData[$i]->getTipodocumento() => $queryData[$i]->getIdtipodocumento()];
                break;
            case 'idmunicipio':
                return [(string) $queryData[$i]->getNombremunicipio() => $queryData[$i]->getIdmunicipio()];
                break;
            case 'idestadocivil':
                return [(string) $queryData[$i]->getEstadocivil() => $queryData[$i]->getIdestadocivil()];
                break;
            case 'idocupacion':
                return [(string) $queryData[$i]->getOcupacion() => $queryData[$i]->getIdocupacion()];
                break;
            case 'idcausadirecta':
                return [(string) $queryData[$i]->getCausadirecta() => $queryData[$i]->getIdcausadirecta()];
                break;
            case 'idprobablemaneramuerte':
                return [(string) $queryData[$i]->getProbablemaneramuerte() => $queryData[$i]->getIdprobablemaneramuerte()];
                break;
            case 'idniveleducativo':
                return [(string) $queryData[$i]->getNiveleducativo() => $queryData[$i]->getIdniveleducativo()];
                break;
            case 'IdNombreArea':
                return [(string) $queryData[$i]->getNombrearea() => $queryData[$i]->getIdarea()];
                break;
            case 'idtipodefuncion':
                return [(string) $queryData[$i]->getTipodefuncion() => $queryData[$i]->getIdtipodefuncion()];
                break;
            case 'idsexo':
                return [(string) $queryData[$i]->getSexo() => $queryData[$i]->getIdsexo()];
                break;
            case 'idregimenseguridad':
                return [(string) $queryData[$i]->getRegimenseguridad() => $queryData[$i]->getIdregimenseguridad()];
                break;
            case 'idpertenenciaetnica':
                return [(string) $queryData[$i]->getPertenenciaetnica() => $queryData[$i]->getIdpertenenciaetnica()];
                break;
            case 'idgrupoindigena':
                return [(string) $queryData[$i]->getGrupoindigena() => $queryData[$i]->getIdgrupoindigena()];
                break;
            default:
                # code...
                break;
        }
    }

    public function arrOptions(string $label, bool $expanded, bool $multiple)
    {
        return array(
            'label' => $label,
            'placeholder' => 'Seleccionar...',
            'choices' => [],
            'expanded' => $expanded,
            'multiple' => $multiple
        );
    }

    public function addField($form, string $fieldName, $fieldType, array $arrOptions = null)
    {
        $form->add($fieldName, $fieldType, $arrOptions);
    }

    public function fillForm($formFallecido, $dataFallecido)
    {
        $formFallecido['fechanacimientofallecido']->setData($dataFallecido->getFechanacimientofallecido());
        $formFallecido['fechadefuncion']->setData($dataFallecido->getFechadefuncion());
        $formFallecido['idadministradoraseguridad']->setData($dataFallecido->getIdadministradoraseguridad());
        $formFallecido['idprobablemaneramuerte']->setData($dataFallecido->getIdprobablemaneramuerte());
        $formFallecido['idsitiodefuncion']->setData($dataFallecido->getIdsitiodefuncion());
        $formFallecido['idocupacion']->setData($dataFallecido->getIdocupacion());
        $formFallecido['idtipodocumento']->setData($dataFallecido->getIdtipodocumento());
        $formFallecido['idmunicipio']->setData($dataFallecido->getIdmunicipio());
        $formFallecido['idcausadirecta']->setData($dataFallecido->getIdcausadirecta());
        $formFallecido['idestadocivil']->setData($dataFallecido->getIdestadocivil());
        $formFallecido['idinstitucion']->setData($dataFallecido->getIdinstitucion());
        $formFallecido['idniveleducativo']->setData($dataFallecido->getIdniveleducativo());
        $formFallecido['idsexo']->setData($dataFallecido->getIdsexo());
        $formFallecido['idtipodefuncion']->setData($dataFallecido->getIdtipodefuncion());
        $formFallecido['IdNombreArea']->setData($dataFallecido->getIdnombrearea());
        $formFallecido['idregimenseguridad']->setData($dataFallecido->getIdregimenseguridad());
        $formFallecido['idpertenenciaetnica']->setData($dataFallecido->getIdpertenenciaetnica());
        $formFallecido['idgrupoindigena']->setData($dataFallecido->getIdgrupoindigena());
    }
}
