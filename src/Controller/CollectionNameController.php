<?php

namespace App\Controller;

use App\Entity\CollectionName;
use App\Form\CollectionNameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CollectionNameController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/AddCollection", name="AddCollectionName")
     */
    public function add(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $collection = new CollectionName();
        $form = $this->createForm(CollectionNameType::class, $collection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($collection);
            $em->flush();

            $this->addFlash('success', "la collection a bien été ajouté");

            return $this->redirectToRoute("AddCollectionName");
        }

        return $this->render('collection_name/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
