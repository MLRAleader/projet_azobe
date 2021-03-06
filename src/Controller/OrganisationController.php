<?php

namespace App\Controller;

use App\Entity\Organisation;
use App\Entity\User;
use App\Form\OrganisationType;
use App\Repository\OrganisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/organisation")
 */
class OrganisationController extends AbstractController
{
    /**
     * @Route("/", name="organisation_index", methods={"GET"})
     */
    public function index(OrganisationRepository $organisationRepository): Response
    {
        return $this->render('organisation/index.html.twig', [
            'organisations' => $organisationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="organisation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $organisation = new Organisation();
        $form = $this->createForm(OrganisationType::class, $organisation);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Récupération de l'utilisateur.
            $organisation->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($organisation);
            $entityManager->flush();

            return $this->redirectToRoute('account');
        }

        return $this->render('organisation/new.html.twig', [
            'organisation' => $organisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="organisation_show", methods={"GET"})
     */
    public function show(Organisation $organisation): Response
    {
        return $this->render('organisation/show.html.twig', [
            'organisation' => $organisation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="organisation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Organisation $organisation): Response
    {
        $form = $this->createForm(OrganisationType::class, $organisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('organisation_index');
        }

        return $this->render('organisation/edit.html.twig', [
            'organisation' => $organisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="organisation_delete", methods={"POST"})
     */
    public function delete(Request $request, Organisation $organisation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organisation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($organisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('organisation_index');
    }
}
