<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\SignalementCom;
use BlogBundle\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Signalementcom controller.
 *
 */
class SignalementComController extends Controller
{
    /**
     * Lists all signalementCom entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $signalementComs = $em->getRepository('BlogBundle:SignalementCom')->findAll();

        return $this->render('signalementcom/index.html.twig', array(
            'signalementComs' => $signalementComs,
        ));
    }

    /**
     * Creates a new signalementCom entity.
     *
     */
    public function newAction(Request $request,$commentaireId)
    {
        $signalementCom = new Signalementcom();
        $form = $this->createForm('BlogBundle\Form\SignalementComType', $signalementCom);
        $form->handleRequest($request);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('BlogBundle:Commentaire');
		$commentaire = $repository->findOneById($commentaireId);

		$user = $this->getUser();
		
        if ($form->isSubmitted() && $form->isValid()) {
			$signalementCom->setActive(true)
			               ->setDate(new \Datetime())
						   ->setSignalePar($user)
						   ->setSignale($commentaire);
            $em = $this->getDoctrine()->getManager();
            $em->persist($signalementCom);
            $em->flush($signalementCom);

            return $this->redirectToRoute('article_show', array('id' => $commentaire->getArticleAssocie()->getId()));
        }

        return $this->render('signalementcom/new.html.twig', array(
            'signalementCom' => $signalementCom,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a signalementCom entity.
     *
     */
    public function showAction(SignalementCom $signalementCom)
    {
        $deleteForm = $this->createDeleteForm($signalementCom);

        return $this->render('signalementcom/show.html.twig', array(
            'signalementCom' => $signalementCom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing signalementCom entity.
     *
     */
    public function editAction(Request $request, SignalementCom $signalementCom)
    {
        $deleteForm = $this->createDeleteForm($signalementCom);
        $editForm = $this->createForm('BlogBundle\Form\SignalementComType', $signalementCom);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('signalementcom_edit', array('id' => $signalementCom->getId()));
        }

        return $this->render('signalementcom/edit.html.twig', array(
            'signalementCom' => $signalementCom,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a signalementCom entity.
     *
     */
    public function deleteAction(Request $request, SignalementCom $signalementCom)
    {
        $form = $this->createDeleteForm($signalementCom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($signalementCom);
            $em->flush($signalementCom);
        }

        return $this->redirectToRoute('signalementcom_index');
    }

    /**
     * Creates a form to delete a signalementCom entity.
     *
     * @param SignalementCom $signalementCom The signalementCom entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SignalementCom $signalementCom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('signalementcom_delete', array('id' => $signalementCom->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
