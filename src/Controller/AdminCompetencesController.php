<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminCompetencesController extends AbstractController
{
    /**
     * @Route("/admin/competences", name="admin_competences")
     */
    public function index()
    {
        return $this->render('admin_competences/index.html.twig', [
            'controller_name' => 'AdminCompetencesController',
        ]);
    }
}
