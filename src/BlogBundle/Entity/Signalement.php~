<?php

namespace BlogBundle\Entity;

/**
 * Signalement
 */
class Signalement
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $active;


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
     * Set active
     *
     * @param boolean $active
     *
     * @return Signalement
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
    /**
     * @var \BlogBundle\Entity\User
     */
    private $user;

    /**
     * @var \BlogBundle\Entity\Article
     */
    private $article;


    /**
     * Set user
     *
     * @param \BlogBundle\Entity\User $user
     *
     * @return Signalement
     */
    public function setUser(\BlogBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BlogBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set article
     *
     * @param \BlogBundle\Entity\Article $article
     *
     * @return Signalement
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
}
