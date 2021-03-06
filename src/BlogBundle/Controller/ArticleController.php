<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\SignalementCom;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller {

    /**
     * Lists all article entities.
     *
     */
    public function indexAction(Request $request) {
        
        $form = $this->createFormBuilder()
                ->add('Recherche', TextType::class)
                ->add('Valider', SubmitType::class, array('label' => 'Rechercher'))
                ->getForm();

        $form->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $regex = $data['Recherche'];

            $articlesAffiches = $em->getRepository('BlogBundle:Article')->findArticlesWithTitleOrAuthor($regex);
            return $this->render('article/index.html.twig', array(
                    'articles' => $articlesAffiches,
                    'formRecherche' => $form->createView(),
            ));
        }
        
        
        $em = $this->getDoctrine()->getManager();
        if ($this->isGranted('ROLE_ADMIN')) {
            $articlesAffiches = $em->getRepository('BlogBundle:Article')->findAll();
            return $this->render('article/index.html.twig', array(
                        'articles' => $articlesAffiches,
                        'formRecherche' => $form->createView(),
            ));
        } else if ($this->isGranted('ROLE_CRITIQUE')) {
            $articles = $em->getRepository('BlogBundle:Article')->findArticlesCritique($this->getUser());
        } else if ($this->isGranted('ROLE_LECTEUR')) {
            $articles = $em->getRepository('BlogBundle:Article')->findArticlesNonLus($this->getUser());
        } else
            $articles = $em->getRepository('BlogBundle:Article')->findAll();    

        $user = $this->getUser();
        // possible bug
        $articlesAffiches = array();
        foreach ($articles as $article) {
            $cont = 0;
            foreach ($article->getThemes() as $theme) {
                foreach ($user->getTheme() as $userTheme) {
                    if ($userTheme->getAime() == $theme) {
                        $cont = 1;
                    }
                }
            }
            if ($cont == 1)
                array_push($articlesAffiches, $article);
        }
        

        return $this->render('article/index.html.twig', array(
                    'articles' => $articlesAffiches,
                    'formRecherche' => $form->createView(),
        ));
    }

    public function mesArticlesAction() {
        $this->denyAccessUnlessGranted('ROLE_AUTEUR', null, 'YOU SHALL NOT PASS');

        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('BlogBundle:Article')->findByEcritPar($this->getUser()->getId());

        return $this->render('BlogBundle:Article:mesArticles.html.twig', array(// article/index.html.twig
                    'articles' => $articles,
        ));
    }

    /**
     * Creates a new article entity.
     *
     */
    public function newAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_AUTEUR', null, 'YOU SHALL NOT PASS');

            $article = new Article();
            $form = $this->createForm('BlogBundle\Form\ArticleType', $article);
            //$form->add('submit', SubmitType::class, array('label' => 'Valider'));
            $form->handleRequest($request);

            //$repository = $this->getDoctrine()->getManager()->getRepository('BlogBundle:User');
            //$user = $repository->findOneById(1);
            $user = $this->getUser();

            if ($form->isSubmitted() && $form->isValid()) {
                $article->setEcritPar($user)
                        ->setDatePublication(new \Datetime())
                        ->setDateModif(new \Datetime())
                        ->setActive(true);
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush($article);

                return $this->redirectToRoute('article_show', array('id' => $article->getId()));
            
            }
        return $this->render('article/new.html.twig', array(//   BlogBundle:Article:new.html.twig
                    'article' => $article,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     */
    public function showAction(Article $article)
    {
		$repository = $this->getDoctrine()->getManager()->getRepository('BlogBundle:Commentaire');
		$listecom = $repository->findByArticleAssocie($article->getId());
		
		//$signcom = new SignalementCom();
		//$signalercom = $this->createForm('BlogBundle\Form\SignalementComType', $signcom);
		
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/show.html.twig', array(
            'article' => $article,
			'listecom' => $listecom,
			//'signalercom' => $signalercom,
            'delete_form' => $deleteForm->createView(),
            'user' => $this->getUser(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     */
    public function editAction(Request $request, Article $article) {

        if (!(($this->isGranted('ROLE_AUTEUR') && $this->getUser()->getArticle()->contains($article)) || $this->isGranted('ROLE_ADMIN'))) 
            throw $this->createAccessDeniedException('YOU SHALL NOT PASS');

            $deleteForm = $this->createDeleteForm($article);
            $editForm = $this->createForm('BlogBundle\Form\ArticleType', $article);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $article->setDateModif(new \Datetime());
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
            }
        
        return $this->render('article/edit.html.twig', array(
                    'article' => $article,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     */
    public function deleteAction(Request $request, Article $article) {
        if (!(($this->isGranted('ROLE_AUTEUR') && $this->getUser()->getArticle()->contains($article)) || $this->isGranted('ROLE_ADMIN')))
            throw $this->createAccessDeniedException('YOU SHALL NOT PASS');

            $form = $this->createDeleteForm($article);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($article);
                $em->flush($article);
            }

            return $this->redirectToRoute('article_index');
        
    }

    public function addMarqueUserAction(Article $article) {
        $em = $this->getDoctrine()->getManager();
        $article->addMarquesParUser($this->getUser());
        $em->flush($article);
        return $this->redirectToRoute('article_index');
    }
    


    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }
    
    public function deleteArticleAction($id) {
        $em = $this->getDoctrine()->getManager();
        $article=$em->getRepository('BlogBundle:Article')->find($id);
        if (!(($this->isGranted('ROLE_AUTEUR') && $this->getUser()->getArticle()->contains($article)) || $this->isGranted('ROLE_ADMIN')))
            throw $this->createAccessDeniedException('YOU SHALL NOT PASS');


        $article->setActive(0);
        $em->flush();
        return $this->redirectToRoute('article_index');
        
    }

}
