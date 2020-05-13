<?php
namespace App\Controller;



use App\Entity\Noter;
use App\Form\NoterType;
use App\Repository\NoterRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndicatorController extends AbstractController
{
    public function __construct(NoterRepository $repository, ObjectManager $em)
    {
        $this->repository=$repository;
        $this->em=$em;
    }

    public function index(): Response
    {
        return $this->render("pages/indicator.html.twig");
    }
    public function new(Request $request)
    {

        //on va creer une nouvelle property dans ce property le bien est vide puis même logic
        //quavec edit

        $note = new Noter();
        $form = $this->createForm(NoterType::class, $note);

        $form->handleRequest($request);
        //si la requete a ete valide et si le formulaire est valide (on verra les regle de validation apres )
        if ($form->isSubmitted() && $form->isValid()) {
            //avant de flusher on va demander de persiter la methode entity(sera traquer par lentity manager

            //fait la modif
            $this->em->persist($note);
            $this->em->flush();
            $this->addFlash('success', 'Bien ajouté poto');
            return $this->redirectToRoute('home.index');
        }
        return $this->render('pages/indicator.html.twig',
            ['note' => $note,
                'form' => $form->createView()
            ]);

    }
}