<?php

namespace BlogBundle\Entity;

/**
 * UserThemes
 */
class UserThemes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $specialite;

    /**
     * @var \BlogBundle\Entity\User
     */
    private $aimePar;

    /**
     * @var \BlogBundle\Entity\Theme
     */
    private $aime;


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
     * Set specialite
     *
     * @param boolean $specialite
     *
     * @return UserThemes
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return boolean
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set aimePar
     *
     * @param \BlogBundle\Entity\User $aimePar
     *
     * @return UserThemes
     */
    public function setAimePar(\BlogBundle\Entity\User $aimePar = null)
    {
        $this->aimePar = $aimePar;

        return $this;
    }

    /**
     * Get aimePar
     *
     * @return \BlogBundle\Entity\User
     */
    public function getAimePar()
    {
        return $this->aimePar;
    }

    /**
     * Set aime
     *
     * @param \BlogBundle\Entity\Theme $aime
     *
     * @return UserThemes
     */
    public function setAime(\BlogBundle\Entity\Theme $aime = null)
    {
        $this->aime = $aime;

        return $this;
    }

    /**
     * Get aime
     *
     * @return \BlogBundle\Entity\Theme
     */
    public function getAime()
    {
        return $this->aime;
    }
}
