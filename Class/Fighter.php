<?php
/**
 * Created by PhpStorm.
 * User: c03735
 * Date: 04/01/2018
 * Time: 12:38
 */

class Fighter extends Personnage
{

    private $_life;
    private $_degat;
    private $_armor;

    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
        $this->_life = 100;
        $this->_degat = 150;
        $this->_armor = 200;
    }

    /**
     * @return int
     */
    public function getLife()
    {
        return $this->_life;
    }

    /**
     * @param int $life
     */
    public function setLife($life)
    {
        $this->_life = $life;
    }

    /**
     * @return int
     */
    public function getDegat()
    {
        return $this->_degat;
    }

    /**
     * @param int $degat
     */
    public function setDegat($degat)
    {
        $this->_degat = $degat;
    }

    /**
     * @return int
     */
    public function getArmor()
    {
        return $this->_armor;
    }

    /**
     * @param int $armor
     */
    public function setArmor($armor)
    {
        $this->_armor = $armor;
    }

}