<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    /**
     * @Route("/principal", name="principal")
     */
    public function index()
    {
        return $this->render('principal/index.html.twig', [
            'controller_name' => 'PrincipalController',
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('principal/home.html.twig', [
            'title' => "Aux petits maux les petits remèdes",
            'age'=>40
        ]);

    }
}
