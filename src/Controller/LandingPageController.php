<?php

namespace App\Controller;

use App\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingPageController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function order(Request $request): Response
    {
        $form = $this->createForm(OrderType::class);

        // Traitez le formulaire lorsqu'il est soumis
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Effectuez les actions nécessaires, par exemple, enregistrez les données dans la base de données.

            // Redirigez l'utilisateur vers la page de confirmation
            return $this->redirectToRoute('confirmation');
        }

        // Affichez le formulaire dans le modèle correspondant.
        return $this->render('landing_page/index_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(): Response
    {
        return $this->render('landing_page/confirmation.html.twig');
    }


}