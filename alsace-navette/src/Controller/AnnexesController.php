<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnnexesController extends AbstractController
{
    /**
     * @Route("/royalpalace", name="royalpalace")
     */
    public function index()
    {
        return $this->render('royalpalace/royalpalace.html.twig', [
            'controller_name' => 'AnnexesController',
        ]);
    }

    /**
     * @Route("/royalpalacereservation", name="royalpalacereservation")
     */
    public function royalpalaceRouteReservation()
    {
        return $this->render('royalpalace/royalpalacereservation.html.twig', [
            'controller_name' => 'AnnexesController',
        ]);
    }
}
