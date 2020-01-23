<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/AddAuthor", name="AddAuthor")
     */
    public function add(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($author);
            $em->flush();

            $this->addFlash('success', "l'auteur a bien été ajouté");

            return $this->redirectToRoute('AddAuthor');
        }

        return $this->render('Author/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
