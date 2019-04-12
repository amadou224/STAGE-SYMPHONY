<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppMobileController extends AbstractController
{
    /**
     * @Route("/app/mobile", name="app_mobile")
     */
    public function index()
    {
        return $this->render('app_mobile/index.html.twig', [
            'controller_name' => 'AppMobileController',
        ]);
    }

    /**
     * @Route("/app/user", name="user")
     */
    public function query() {

        $user = $this->getDoctrine()->getRepository(User::class);

        $premierUser = $user->findPremsUser();
        
        return new JsonResponse($premierUser);
    }
}
