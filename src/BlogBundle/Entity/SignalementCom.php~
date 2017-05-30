<?php

namespace BlogBundle\Entity;

/**
 * SignalementCom
 */
class SignalementCom
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $raison;

    /**
     * @var \BlogBundle\Entity\User
     */
    private $signalePar;

    /**
     * @var \BlogBundle\Entity\Commentaire
     */
    private $signale;


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
     * Set active
     *
     * @param boolean $active
     *
     * @return SignalementCom
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return SignalementCom
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set raison
     *
     * @param string $raison
     *
     * @return SignalementCom
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;

        return $this;
    }

    /**
     * Get raison
     *
     * @return string
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * Set signalePar
     *
     * @param \BlogBundle\Entity\User $signalePar
     *
     * @return SignalementCom
     */
    public function setSignalePar(\BlogBundle\Entity\User $signalePar = null)
    {
        $this->signalePar = $signalePar;

        return $this;
    }

    /**
     * Get signalePar
     *
     * @return \BlogBundle\Entity\User
     */
    public function getSignalePar()
    {
        return $this->signalePar;
    }

    /**
     * Set signale
     *
     * @param \BlogBundle\Entity\Commentaire $signale
     *
     * @return SignalementCom
     */
    public function setSignale(\BlogBundle\Entity\Commentaire $signale = null)
    {
        $this->signale = $signale;

        return $this;
    }

    /**
     * Get signale
     *
     * @return \BlogBundle\Entity\Commentaire
     */
    public function getSignale()
    {
        return $this->signale;
    }
}
