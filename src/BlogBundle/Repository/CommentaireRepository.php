<?php

namespace BlogBundle\Repository;

/**
 * CommentaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentaireRepository extends \Doctrine\ORM\EntityRepository
{
    public function findMesCommentaires($user) {
        $query = $this->getEntityManager()->createQuery("
			SELECT a FROM BlogBundle:Commentaire a
			JOIN a.commentePar u 
			WHERE u = :user");
        //JOIN a.marques_par_users u WITH u = :user");
        $query->setParameter('user', $user);
        $commentaires = $query->execute();
        //var_dump($articles);
        return $commentaires;
    }
}
