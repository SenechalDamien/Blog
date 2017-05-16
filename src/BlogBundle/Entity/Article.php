<?php

namespace BlogBundle\Entity;

/**
 * Article
 */
class Article
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $datePublication;

    /**
     * @var string
     */
    private $contenu;

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
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Article
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Article
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Article
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commentaires;

    /**
     * @var \BlogBundle\Entity\Theme
     */
    private $theme;

    /**
     * @var \BlogBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commentaire
     *
     * @param \BlogBundle\Entity\Commentaire $commentaire
     *
     * @return Article
     */
    public function addCommentaire(\BlogBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \BlogBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\BlogBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set theme
     *
     * @param \BlogBundle\Entity\Theme $theme
     *
     * @return Article
     */
    public function setTheme(\BlogBundle\Entity\Theme $theme = null)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \BlogBundle\Entity\Theme
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set user
     *
     * @param \BlogBundle\Entity\User $user
     *
     * @return Article
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
     * @var string
     */
    private $titre;

    /**
     * @var \DateTime
     */
    private $dateModif;


    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return Article
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comArticle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $signalement;

    /**
     * @var \BlogBundle\Entity\Theme
     */
    private $themeArticle;

    /**
     * @var \BlogBundle\Entity\User
     */
    private $ecritPar;


    /**
     * Add comArticle
     *
     * @param \BlogBundle\Entity\Commentaire $comArticle
     *
     * @return Article
     */
    public function addComArticle(\BlogBundle\Entity\Commentaire $comArticle)
    {
        $this->comArticle[] = $comArticle;

        return $this;
    }

    /**
     * Remove comArticle
     *
     * @param \BlogBundle\Entity\Commentaire $comArticle
     */
    public function removeComArticle(\BlogBundle\Entity\Commentaire $comArticle)
    {
        $this->comArticle->removeElement($comArticle);
    }

    /**
     * Get comArticle
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComArticle()
    {
        return $this->comArticle;
    }

    /**
     * Add signalement
     *
     * @param \BlogBundle\Entity\SignalementArticle $signalement
     *
     * @return Article
     */
    public function addSignalement(\BlogBundle\Entity\SignalementArticle $signalement)
    {
        $this->signalement[] = $signalement;

        return $this;
    }

    /**
     * Remove signalement
     *
     * @param \BlogBundle\Entity\SignalementArticle $signalement
     */
    public function removeSignalement(\BlogBundle\Entity\SignalementArticle $signalement)
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
     * Set themeArticle
     *
     * @param \BlogBundle\Entity\Theme $themeArticle
     *
     * @return Article
     */
    public function setThemeArticle(\BlogBundle\Entity\Theme $themeArticle = null)
    {
        $this->themeArticle = $themeArticle;

        return $this;
    }

    /**
     * Get themeArticle
     *
     * @return \BlogBundle\Entity\Theme
     */
    public function getThemeArticle()
    {
        return $this->themeArticle;
    }

    /**
     * Set ecritPar
     *
     * @param \BlogBundle\Entity\User $ecritPar
     *
     * @return Article
     */
    public function setEcritPar(\BlogBundle\Entity\User $ecritPar = null)
    {
        $this->ecritPar = $ecritPar;

        return $this;
    }

    /**
     * Get ecritPar
     *
     * @return \BlogBundle\Entity\User
     */
    public function getEcritPar()
    {
        return $this->ecritPar;
    }
}
