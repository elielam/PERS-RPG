<?php
/**
 * Created by PhpStorm.
 * User: c03735
 * Date: 08/01/2018
 * Time: 14:45
 */

class Thief extends Personnage
{

    private $_life = 2000;
    private $_degat = 200;
    private $_armor = 35;
    private $_agi = 70;
    private $_str = 50;
    private $_dex = 50;
    private $_luck = 70;

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
     * @return mixed
     */
    public function getAgi()
    {
        return $this->_agi;
    }

    /**
     * @param mixed $agi
     */
    public function setAgi($agi)
    {
        $this->_agi = $agi;
    }

    /**
     * @return mixed
     */
    public function getStr()
    {
        return $this->_str;
    }

    /**
     * @param mixed $str
     */
    public function setStr($str)
    {
        $this->_str = $str;
    }

    /**
     * @return mixed
     */
    public function getDex()
    {
        return $this->_dex;
    }

    /**
     * @param mixed $dex
     */
    public function setDex($dex)
    {
        $this->_dex = $dex;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->_luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck)
    {
        $this->_luck = $luck;
    }

}