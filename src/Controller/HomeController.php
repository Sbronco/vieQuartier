<?php
namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController
{
    private $twig;

    public function __construct()
    {

    }

    public function index(): Response
    {
        return $this->render('pages/home.html.twig');
    }



}