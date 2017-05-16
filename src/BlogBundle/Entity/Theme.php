<?php

namespace BlogBundle\Entity;

/**
 * Theme
 */
class Theme
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Theme
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Theme
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $articleAssocie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articleAssocie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \BlogBundle\Entity\UserThemes $user
     *
     * @return Theme
     */
    public function addUser(\BlogBundle\Entity\UserThemes $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \BlogBundle\Entity\UserThemes $user
     */
    public function removeUser(\BlogBundle\Entity\UserThemes $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add articleAssocie
     *
     * @param \BlogBundle\Entity\Article $articleAssocie
     *
     * @return Theme
     */
    public function addArticleAssocie(\BlogBundle\Entity\Article $articleAssocie)
    {
        $this->articleAssocie[] = $articleAssocie;

        return $this;
    }

    /**
     * Remove articleAssocie
     *
     * @param \BlogBundle\Entity\Article $articleAssocie
     */
    public function removeArticleAssocie(\BlogBundle\Entity\Article $articleAssocie)
    {
        $this->articleAssocie->removeElement($articleAssocie);
    }

    /**
     * Get articleAssocie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticleAssocie()
    {
        return $this->articleAssocie;
    }
}
