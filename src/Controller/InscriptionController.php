<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormInscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request): Response
    {
        $user = new User;
        $formUser = $this-> createForm(FormInscriptionType::class, $user);
        $formUser->handleRequest($request);

        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    


}
