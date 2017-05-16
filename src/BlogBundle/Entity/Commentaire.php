<?php

namespace BlogBundle\Entity;

/**
 * Commentaire
 */
class Commentaire
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var int
     */
    private $note;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Commentaire
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }
    /**
     * @var \BlogBundle\Entity\Article
     */
    private $article;


    /**
     * Set article
     *
     * @param \BlogBundle\Entity\Article $article
     *
     * @return Commentaire
     */
    public function setArticle(\BlogBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \BlogBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $signalement;

    /**
     * @var \BlogBundle\Entity\User
     */
    private $commentePar;

    /**
     * @var \BlogBundle\Entity\Article
     */
    private $articleAssocie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->signalement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add signalement
     *
     * @param \BlogBundle\Entity\SignalementCom $signalement
     *
     * @return Commentaire
     */
    public function addSignalement(\BlogBundle\Entity\SignalementCom $signalement)
    {
        $this->signalement[] = $signalement;

        return $this;
    }

    /**
     * Remove signalement
     *
     * @param \BlogBundle\Entity\SignalementCom $signalement
     */
    public function removeSignalement(\BlogBundle\Entity\SignalementCom $signalement)
    {
        $this->signalement->removeElement($signalement);
    }

    /**
     * Get signalement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSignalement()
    {
        return $this->signalement;
    }

    /**
     * Set commentePar
     *
     * @param \BlogBundle\Entity\User $commentePar
     *
     * @return Commentaire
     */
    public function setCommentePar(\BlogBundle\Entity\User $commentePar = null)
    {
        $this->commentePar = $commentePar;

        return $this;
    }

    /**
     * Get commentePar
     *
     * @return \BlogBundle\Entity\User
     */
    public function getCommentePar()
    {
        return $this->commentePar;
    }

    /**
     * Set articleAssocie
     *
     * @param \BlogBundle\Entity\Article $articleAssocie
     *
     * @return Commentaire
     */
    public function setArticleAssocie(\BlogBundle\Entity\Article $articleAssocie = null)
    {
        $this->articleAssocie = $articleAssocie;

        return $this;
    }

    /**
     * Get articleAssocie
     *
     * @return \BlogBundle\Entity\Article
     */
    public function getArticleAssocie()
    {
        return $this->articleAssocie;
    }
}
