<?php

namespace BlogBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var int
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
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $theme;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->theme = new \Doctrine\Common\Collections\ArrayCollection();
        $this->role = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add role
     *
     * @param \BlogBundle\Entity\Role $role
     *
     * @return User
     */
    public function addRole(\BlogBundle\Entity\Role $role)
    {
        $this->role[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \BlogBundle\Entity\Role $role
     */
    public function removeRole(\BlogBundle\Entity\Role $role)
    {
        $this->role->removeElement($role);
    }

    /**
     * Get role
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $specialite;


    /**
     * Add specialite
     *
     * @param \BlogBundle\Entity\Theme $specialite
     *
     * @return User
     */
    public function addSpecialite(\BlogBundle\Entity\Theme $specialite)
    {
        $this->specialite[] = $specialite;

        return $this;
    }

    /**
     * Remove specialite
     *
     * @param \BlogBundle\Entity\Theme $specialite
     */
    public function removeSpecialite(\BlogBundle\Entity\Theme $specialite)
    {
        $this->specialite->removeElement($specialite);
    }

    /**
     * Get specialite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }
}
