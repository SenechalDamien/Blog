<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\User;
use BlogBundle\Entity\UserThemes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('BlogBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('BlogBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function profilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $themes = $em->getRepository('BlogBundle:Theme')->findAll();
        return $this->render('user/profil.html.twig', array("themes" => $themes));
    }
    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('BlogBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    public function addUserThemeAction($id)
    {
        $userThemes = $em->getRepository('BlogBundle:UserTheme')->findBy(array('aime' => $id), array('aimePar' => $this->getUser()->getId()));
        if($userThemes->count() != 0)
            return $this->redirectToRoute('profil');

        $em = $this->getDoctrine()->getManager();
        $theme = $em->getRepository('BlogBundle:Theme')->find($id);//findOneBy(array('nom' => $id));

        $userTheme = new UserThemes;
        $userTheme->setAimePar($this->getUser());
        $userTheme->setAime($theme);
        $userTheme->setSpecialite(0);

        $em->persist($userTheme);
        $em->flush();
        return $this->redirectToRoute('profil');
    }

    public function addSpecialiteAction($id)
    {
        $user = $this->getUser();
        foreach($user->getTheme() as $theme){
            if($theme->getAime() == $theme)
                $theme->setSpecialite(1);
        }
        return $this->redirectToRoute('profil');
    }

    public function removeUserTheme($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userThemes = $em->getRepository('BlogBundle:UserTheme')->findBy(array('aime' => $id), array('aimePar' => $this->getUser()->getId()));
        if($userThemes->count() == 0)
            return $this->redirectToRoute('profil');
        else {
            foreach($userThemes as $userTheme) {
                $em->remove($userTheme)
            }
        }
        return $this->redirectToRoute('profil');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


}
