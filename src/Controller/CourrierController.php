<?php

namespace App\Controller;

use App\Entity\Courrier;
use App\Form\CourrierType;
use App\Repository\CourrierRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 * @IsGranted("ROLE_USER")
 */
class CourrierController extends AbstractController
{
    /**
     * @Route("/", name="courrier_index", methods={"GET"})
     */
    public function index(CourrierRepository $courrierRepository): Response
    {
        return $this->render('courrier/index.html.twig', [
            'courriers' => $courrierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/courrier/new", name="courrier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $courrier = new Courrier();
        $form = $this->createForm(CourrierType::class, $courrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $courrier = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($courrier);
            $entityManager->flush();

            return $this->redirectToRoute('courrier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('courrier/new.html.twig', [
            'courrier' => $courrier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/courrier/{id}", name="courrier_show", methods={"GET"})
     */
    public function show(Courrier $courrier): Response
    {
        return $this->render('courrier/show.html.twig', [
            'courrier' => $courrier,
        ]);
    }

    /**
     * @Route("/courrier/{id}/edit", name="courrier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Courrier $courrier): Response
    {
        $form = $this->createForm(CourrierType::class, $courrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('courrier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('courrier/edit.html.twig', [
            'courrier' => $courrier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/courrier/{id}", name="courrier_delete", methods={"POST"})
     */
    public function delete(Request $request, Courrier $courrier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$courrier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($courrier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('courrier_index', [], Response::HTTP_SEE_OTHER);
    }
}
