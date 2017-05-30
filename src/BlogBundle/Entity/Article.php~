<?php

namespace BlogBundle\Entity;

/**
 * Article
 */
class Article
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var \DateTime
     */
    private $dateModif;

    /**
     * @var \DateTime
     */
    private $datePublication;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comArticle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $signalement;

    /**
     * @var \BlogBundle\Entity\User
     */
    private $ecritPar;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $themes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comArticle = new \Doctrine\Common\Collections\ArrayCollection();
        $this->signalement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->themes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

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

    /**
     * Add theme
     *
     * @param \BlogBundle\Entity\Theme $theme
     *
     * @return Article
     */
    public function addTheme(\BlogBundle\Entity\Theme $theme)
    {
        $this->themes[] = $theme;

        return $this;
    }

    /**
     * Remove theme
     *
     * @param \BlogBundle\Entity\Theme $theme
     */
    public function removeTheme(\BlogBundle\Entity\Theme $theme)
    {
        $this->themes->removeElement($theme);
    }

    /**
     * Get themes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getThemes()
    {
        return $this->themes;
    }
}
