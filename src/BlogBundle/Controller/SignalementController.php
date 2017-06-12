<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\SignalementCom;
use BlogBundle\Entity\SignalementArticle;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Signalement controller.
 *
 */
class SignalementController extends Controller {

    public function mesSignalementsAction() {
        $em = $this->getDoctrine()->getManager();

        if ($this->isGranted("ROLE_ADMIN")) {
            $signalementsArt = $em->getRepository('BlogBundle:SignalementArticle')->findAll();
            $signalementsCom = $em->getRepository('BlogBundle:SignalementCom')->findAll();
        } else {
            $signalementsArt = $em->getRepository('BlogBundle:SignalementArticle')->findBySignalePar($this->getUser()->getId());
            $signalementsCom = $em->getRepository('BlogBundle:SignalementCom')->findBySignalePar($this->getUser()->getId());
        }

        return $this->render('BlogBundle:Signalements:mesSignalements.html.twig', array(
                    'signalementsArt' => $signalementsArt,
                    'signalementsCom' => $signalementsCom,
        ));
    }

    public function deleteSignArtAction($id) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($em->getRepository('BlogBundle:SignalementArticle')->find($id));
        $em->flush();
        return $this->redirectToRoute('mesSignalements');
    }

    public function deleteSignComAction($id) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($em->getRepository('BlogBundle:SignalementCom')->find($id));
        $em->flush();
        return $this->redirectToRoute('mesSignalements');
    }

}
