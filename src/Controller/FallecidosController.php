<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Datosfallecido;

class FallecidosController extends AbstractController
{
    /**
     * @Route("/fallecidos", name="fallecidos")
     */
    public function index(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $fallecidos = $em->getRepository(Datosfallecido::class)->findAll();
        return $this->render('fallecidos/index.html.twig', [
            'controller_name' => 'FallecidosController',
            'fallecidos' => $fallecidos
        ]);
    }
}
