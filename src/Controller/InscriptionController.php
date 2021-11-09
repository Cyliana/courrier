<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormInscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription_index")
     * @Route("/inscription/{id}/edit", name="inscription_edit")
     */
    public function index(User $user= null, Request $request, UserPasswordHasherInterface $hasher): Response
    {
        if(!$user)
        {
            $user = new User;
        }
        
        $formUser = $this-> createForm(FormInscriptionType::class, $user);
        $formUser->handleRequest($request);

        if($formUser->isSubmitted() && $formUser->isValid())
        {
            $user = $formUser->getData();
                    
            $password = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($password);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success','Vous êtes bien enregistré !');

            return $this->redirectToRoute('courrier_index');
        }

        return $this->render('inscription/index.html.twig', [
            'FormInscription' => $formUser->createView(),
            'user' => $user
        ]);
    }

    


}
