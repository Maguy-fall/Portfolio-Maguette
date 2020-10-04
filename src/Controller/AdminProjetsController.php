<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminProjetsController extends AbstractController
{
    /**
     * @Route("/admin/projets", name="admin_projets")
     */
    public function index()
    {
        return $this->render('admin_projets/index.html.twig', [
            'controller_name' => 'AdminProjetsController',
        ]);
    }
}
