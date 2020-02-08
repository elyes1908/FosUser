<?php

namespace CoursBundle\Controller;

use CoursBundle\Entity\Cours;
use CoursBundle\Form\CoursType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class CoursController extends Controller
{
    public function AjouterCoursAction(Request $r)
    {
        $Cours = new Cours();
        $form = $this->createForm(CoursType::class, $Cours);
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($r);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Cours);
            $em->flush();
            return $this->redirectToRoute('AfficherCours');
        }
        return $this->render('@Cours/Cours/ajouter_cours.html.twig', array('form' => $form->createView()
            // ...
        ));
    }

    public function AfficherCoursAction()
    {
        $Cours = $this->getDoctrine()->getRepository(Cours::class)->findAll();
        return $this->render('@Cours/Cours/afficher_cours.html.twig', array('Cours' => $Cours
            // ...
        ));
    }

    public function ModifierCoursAction($id, Request $r)
    {
        $Cours = $this->getDoctrine()->getRepository(Cours::class)->find($id);
        $form = $this->createFormBuilder($Cours)->add('Libelle')->add('Niveau')->add('Modifier', SubmitType::class)->getForm();
        $form->handleRequest($r);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('AfficherCours');
        }
        return $this->render('@Cours/Cours/modifier_cours.html.twig', array('form' => $form->createView()
            // ...
        ));
    }

    public function SupprimerCoursAction($id)
    {
        $Cours = $this->getDoctrine()->getRepository(Cours::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($Cours);
        $em->flush();
       return $this->redirectToRoute('AfficherCours');

    }

}
