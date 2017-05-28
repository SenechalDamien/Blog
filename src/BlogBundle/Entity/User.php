<?php

namespace BlogBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $mdp;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comSignale;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $articleSignale;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $theme;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $article;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $com;

    /**
     * @var \BlogBundle\Entity\Role
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comSignale = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articleSignale = new \Doctrine\Common\Collections\ArrayCollection();
        $this->theme = new \Doctrine\Common\Collections\ArrayCollection();
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
        $this->com = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     *
     * @return User
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add comSignale
     *
     * @param \BlogBundle\Entity\SignalementCom $comSignale
     *
     * @return User
     */
    public function addComSignale(\BlogBundle\Entity\SignalementCom $comSignale)
    {
        $this->comSignale[] = $comSignale;

        return $this;
    }

    /**
     * Remove comSignale
     *
     * @param \BlogBundle\Entity\SignalementCom $comSignale
     */
    public function removeComSignale(\BlogBundle\Entity\SignalementCom $comSignale)
    {
        $this->comSignale->removeElement($comSignale);
    }

    /**
     * Get comSignale
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComSignale()
    {
        return $this->comSignale;
    }

    /**
     * Add articleSignale
     *
     * @param \BlogBundle\Entity\SignalementArticle $articleSignale
     *
     * @return User
     */
    public function addArticleSignale(\BlogBundle\Entity\SignalementArticle $articleSignale)
    {
        $this->articleSignale[] = $articleSignale;

        return $this;
    }

    /**
     * Remove articleSignale
     *
     * @param \BlogBundle\Entity\SignalementArticle $articleSignale
     */
    public function removeArticleSignale(\BlogBundle\Entity\SignalementArticle $articleSignale)
    {
        $this->articleSignale->removeElement($articleSignale);
    }

    /**
     * Get articleSignale
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticleSignale()
    {
        return $this->articleSignale;
    }

    /**
     * Add theme
     *
     * @param \BlogBundle\Entity\Theme $theme
     *
     * @return User
     */
    public function addTheme(\BlogBundle\Entity\Theme $theme)
    {
        $this->theme[] = $theme;

        return $this;
    }

    /**
     * Remove theme
     *
     * @param \BlogBundle\Entity\Theme $theme
     */
    public function removeTheme(\BlogBundle\Entity\Theme $theme)
    {
        $this->theme->removeElement($theme);
    }

    /**
     * Get theme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Add article
     *
     * @param \BlogBundle\Entity\Article $article
     *
     * @return User
     */
    public function addArticle(\BlogBundle\Entity\Article $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \BlogBundle\Entity\Article $article
     */
    public function removeArticle(\BlogBundle\Entity\Article $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Add com
     *
     * @param \BlogBundle\Entity\Commentaire $com
     *
     * @return User
     */
    public function addCom(\BlogBundle\Entity\Commentaire $com)
    {
        $this->com[] = $com;

        return $this;
    }

    /**
     * Remove com
     *
     * @param \BlogBundle\Entity\Commentaire $com
     */
    public function removeCom(\BlogBundle\Entity\Commentaire $com)
    {
        $this->com->removeElement($com);
    }

    /**
     * Get com
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCom()
    {
        return $this->com;
    }

    /**
     * Set role
     *
     * @param \BlogBundle\Entity\Role $role
     *
     * @return User
     */
    public function setRole(\BlogBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \BlogBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }
	
	public function __toString(){
		return $this->login;
	}
}

