<?php

namespace BlogBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function navigationAction()
    {
        $actions = Array();

        $user = $this->getUser();
        $rolesUser = $user->getRoles();
        return $this->render('BlogBundle:Default:navigation.html.twig', array(
            'user' => $user,
            'rolesUser' => $rolesUser
        ));
    }
}
