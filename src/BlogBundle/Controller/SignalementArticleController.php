<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\SignalementArticle;
use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Signalementarticle controller.
 *
 */
class SignalementArticleController extends Controller
{
    /**
     * Lists all signalementArticle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $signalementArticles = $em->getRepository('BlogBundle:SignalementArticle')->findAll();

        return $this->render('signalementarticle/index.html.twig', array(
            'signalementArticles' => $signalementArticles,
        ));
    }

    /**
     * Creates a new signalementArticle entity.
     *
     */
    public function newAction(Request $request, Int $articleId)
    {
        $signalementArticle = new Signalementarticle();
        $form = $this->createForm('BlogBundle\Form\SignalementArticleType', $signalementArticle);
        $form->handleRequest($request);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('BlogBundle:Article');
		$article = $repository->findOneById($articleId);

		$user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
			$signalementArticle->setActive(true)
			               ->setDate(new \Datetime())
						   ->setSignalePar($user)
						   ->setSignale($article);
            $em = $this->getDoctrine()->getManager();
            $em->persist($signalementArticle);
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('signalementarticle/new.html.twig', array(
            'signalementArticle' => $signalementArticle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a signalementArticle entity.
     *
     */
    public function showAction(SignalementArticle $signalementArticle)
    {
        $deleteForm = $this->createDeleteForm($signalementArticle);

        return $this->render('signalementarticle/show.html.twig', array(
            'signalementArticle' => $signalementArticle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing signalementArticle entity.
     *
     */
    public function editAction(Request $request, SignalementArticle $signalementArticle)
    {
        $deleteForm = $this->createDeleteForm($signalementArticle);
        $editForm = $this->createForm('BlogBundle\Form\SignalementArticleType', $signalementArticle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('signalementarticle_edit', array('id' => $signalementArticle->getId()));
        }

        return $this->render('signalementarticle/edit.html.twig', array(
            'signalementArticle' => $signalementArticle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a signalementArticle entity.
     *
     */
    public function deleteAction(Request $request, SignalementArticle $signalementArticle)
    {
        $form = $this->createDeleteForm($signalementArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($signalementArticle);
            $em->flush();
        }

        return $this->redirectToRoute('signalementarticle_index');
    }

    /**
     * Creates a form to delete a signalementArticle entity.
     *
     * @param SignalementArticle $signalementArticle The signalementArticle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SignalementArticle $signalementArticle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('signalementarticle_delete', array('id' => $signalementArticle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
