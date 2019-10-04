<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render("home/mainview.html.twig");
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/addBook", name="AddBook")
     */
    public function addBook(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid())
        {

            $em->persist($book);
            $em->flush();

            $this->addFlash('success', 'Le livre a bien été enregistré');

            return $this->redirectToRoute('AddBook');
        }


        return $this->render('book/new.html.twig',
            [
                'form'=> $form->createView()
            ]
        );
    }

    /**
     * @Route("/list", name="book_list")
     */
    public function list()
    {

        $em = $this->getDoctrine()->getManager();
        $bookList = $em->getRepository(Book::class)->findAll();

        return $this->render('book/list.html.twig', [
            'bookList' => $bookList
        ]);
    }

}