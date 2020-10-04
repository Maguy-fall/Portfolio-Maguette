<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Form\CompetencesType;
use App\Repository\CompetencesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminCompetencesController extends AbstractController
{
    /**
     * @Route("/admin/competences", name="admin_competences")
     */
    public function index(CompetencesRepository $CompetencesRepository)
    {
        $competences = $CompetencesRepository->findAll();

        return $this->render('admin/skill.html.twig', [
            'competences' => $competences,
        ]);
    }
    /**
     * @Route("/admin/competences/create", name="admin_competences_create")
     */
    public function createCompetence(Request $request)
    {
        $Competence = new Competences();

        $form = $this->createForm(CompetencesType::class, $Competence);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($Competence);
                $manager->flush();
                $this->addFlash(
                  'success',
                  'competence a été bien ajoutée'
                );
            }
            else{
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue'
                );
            }
            return $this->redirectToRoute('admin_competences');
        }
        return $this->render('admin/competencesForm.html.twig', [
            'formulaireCompetence' => $form->createView()
        ]);    
    }
    /**
     * @Route("/admin/competences/update-{id}", name="competences_update")
     */
    public function updateCompetence(CompetencesRepository $CompetencesRepository, $id, Request $request)
    {
        $Competence = $CompetencesRepository->find($id);

        $form = $this->createForm(CompetencesType::class, $Competence);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Competence);
            $manager->flush();
            $this->addFlash(
                'success',
                'Competence a été bien modifiée'
            );
            return $this->redirectToRoute('admin_competences');
        }
        return $this->render('admin/competencesForm.html.twig', [
            'formulaireCompetence' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/competences/delete-{id}", name="competences_delete")
     */
    public function deleteCompetence(CompetencesRepository $CompetencesRepository, $id)
    {
        $Competence = $CompetencesRepository->find($id);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($Competence);
        $manager->flush();

        $this->addFlash(
            'danger',
            'Competence a été bien supprimée'
        );

        return $this->redirectToRoute('admin_competences');
    }
}
