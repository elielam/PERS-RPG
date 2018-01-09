<?php
/**
 * Created by PhpStorm.
 * User: c03735
 * Date: 04/01/2018
 * Time: 12:38
 */

class Fighter extends Personnage
{

    private $_life = 2000;
    private $_degat = 350;
    private $_armor = 100;
    private $_agi = 70;
    private $_str = 70;
    private $_dex = 50;
    private $_luck = 30;

    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
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

    /**
     * @return int
     */
    public function getAgi()
    {
        return $this->_agi;
    }

    /**
     * @param int $agi
     */
    public function setAgi($agi)
    {
        $this->_agi = $agi;
    }

    /**
     * @return int
     */
    public function getStr()
    {
        return $this->_str;
    }

    /**
     * @param int $str
     */
    public function setStr($str)
    {
        $this->_str = $str;
    }

    /**
     * @return int
     */
    public function getDex()
    {
        return $this->_dex;
    }

    /**
     * @param int $dex
     */
    public function setDex($dex)
    {
        $this->_dex = $dex;
    }

    /**
     * @return int
     */
    public function getLuck()
    {
        return $this->_luck;
    }

    /**
     * @param int $luck
     */
    public function setLuck($luck)
    {
        $this->_luck = $luck;
    }

}