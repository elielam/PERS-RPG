<?php
/**
 * Created by PhpStorm.
 * User: c03735
 * Date: 04/01/2018
 * Time: 11:52
 */

class Wizard extends Personnage
{

    private $_life;
    private $_degat;
    private $_armor;

    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
        $this->_life = 50;
        $this->_degat = 200;
        $this->_armor = 50;
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