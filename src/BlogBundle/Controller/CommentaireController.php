<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Commentaire;
use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commentaire controller.
 *
 */
class CommentaireController extends Controller
{
    /**
     * Lists all commentaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commentaires = $em->getRepository('BlogBundle:Commentaire')->findAll();

        return $this->render('commentaire/index.html.twig', array(
            'commentaires' => $commentaires,
        ));
    }

    public function index_mes_commentairesAction()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $commentaires = $em->getRepository('BlogBundle:Commentaire')->findMesCommentaires($user);

        return $this->render('commentaire/index.html.twig', array(
            'commentaires' => $commentaires,
        ));
    }

    /**
     * Creates a new commentaire entity.
     *
     */
    public function newAction(Request $request, $articleId)
    {
        $commentaire = new Commentaire();
        $form = $this->createForm('BlogBundle\Form\CommentaireType', $commentaire);
        $form->handleRequest($request);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('BlogBundle:Article');
		$article = $repository->findOneById($articleId);
		
		$user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
			$commentaire->setCommentePar($user)
                    ->setArticleAssocie($article);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush($commentaire);

            return $this->redirectToRoute('article_show', array('id' => $articleId));
        }

        return $this->render('commentaire/new.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentaire entity.
     *
     */
    public function showAction(Commentaire $commentaire)
    {
        $deleteForm = $this->createDeleteForm($commentaire);

        return $this->render('commentaire/show.html.twig', array(
            'commentaire' => $commentaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentaire entity.
     *
     */
    public function editAction(Request $request, Commentaire $commentaire)
    {

        $deleteForm = $this->createDeleteForm($commentaire);
        $editForm = $this->createForm('BlogBundle\Form\CommentaireType', $commentaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentaire_edit', array('id' => $commentaire->getId()));
        }

        return $this->render('commentaire/edit.html.twig', array(
            'commentaire' => $commentaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentaire entity.
     *
     */
    public function deleteAction(Request $request, Commentaire $commentaire)
    {
        $form = $this->createDeleteForm($commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentaire);
            $em->flush($commentaire);
        }

        return $this->redirectToRoute('commentaire_index');
    }

    /**
     * Creates a form to delete a commentaire entity.
     *
     * @param Commentaire $commentaire The commentaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commentaire $commentaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaire_delete', array('id' => $commentaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
