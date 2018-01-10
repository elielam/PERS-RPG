<?php

class GameManager {

    private $eventAttacker;
    private $eventAttacked;
    private $manager;

    public function __construct($db)
    {
        $this->manager = new PersonnagesManager($db);
    }

    public function hit(Personnage $enemy) {
        // LINK TO FUNCTION WORK
        // NEED TO DEV METHOD OF HIT FUNCTION
        // RETURN int $damage

        // ############################################################# //

        $this->eventAttacker = null;
        $this->eventAttacker = array(
          'str' => '',
          'agi' => '',
          'dex' => '',
          'luck' => 'Pas de critique',
          'armor' => '',
          'damage' => '',
          'event' => '',
        );

        // Attacker
        $agi = $_SESSION['character']->getAgi();
        $str = $_SESSION['character']->getStr();
        $dex = $_SESSION['character']->getDex();
        $luck = $_SESSION['character']->getLuck();
        $damage = $_SESSION['character']->getDegat();

        // STRONG
        $damage += $str/10;
        $this->eventAttacker['str'] = "Str : ".$str." || PostStr : ".($str/10);

        // AGILITY
        if ($agi == 100 ) {
            $damage = $damage*2;
            $this->eventAttacker['agi'] = "Multiplicateur x2";
        } else if ($agi >= 75 && $agi < 100 ) {
            $damage = $damage*1.75;
            $this->eventAttacker['agi'] = "Multiplicateur x1.75";
        } else if ($agi >= 50 && $agi < 75 ) {
            $damage = $damage*1.5;
            $this->eventAttacker['agi'] = "Multiplicateur 1.5";
        } else if ($agi >= 25 && $agi < 50 ) {
            $damage = $damage*1.25;
            $this->eventAttacker['agi'] = "Multiplicateur x1.25";
        } else {
            $damage = $damage+$agi;
            $this->eventAttacker['agi'] = "Ajout point d'agi";
        }

        // DEXTERITY
        if ($dex == 100 ) {
            $this->eventAttacker['dex'] = "Pas de perte";
        } else if ($dex >= 80 && $dex < 100 ) {
            $damage -= ($damage/10);
            $this->eventAttacker['dex'] = "Damage - Damage/10";
        } else if ($dex >= 60 && $dex < 80 ) {
            $damage -= ($damage/8);
            $this->eventAttacker['dex'] = "Damage - Damage/8";
        } else if ($dex >= 40 && $dex < 60 ) {
            $damage -= ($damage/6);
            $this->eventAttacker['dex'] = "Damage - Damage/6";
        } else if ($dex >= 20 && $dex < 40 ) {
            $damage -= ($damage/4);
            $this->eventAttacker['dex'] = "Damage - Damage/4";
        } else if ($dex >= 0 && $dex < 20 ) {
            $damage -= ($damage/2);
            $this->eventAttacker['dex'] = "Damage - Damage/2";
        }

        // LUCK
        $rand = rand(1, 100);
        if ($luck == $rand) {
            $damage += (50/100)*$damage;
            $this->eventAttacker['luck'] = "Super critique || rand : ".$rand;
        } else if ($luck > $rand) {
            $damage += (25/100)*$damage;
            $this->eventAttacker['luck'] = "Critique || rand : ".$rand;
        }

        $this->eventAttacker['damage'] = $damage;

        // Damage Function call
        $this->damage($enemy, $damage);

    }

    public function damage (Personnage $perso, $damage) {

        $this->eventAttacked = null;
        $this->eventAttacked = array(
            'agi' => '',
            'luck' => '',
            'armor' => '',
            'damage' => ''
        );

        // Attacked
        $agi = $perso->getAgi();
        $luck = $perso->getLuck();
        $armor = $perso->getArmor();

        // AGILITY
        if ($agi == 100 ) {
            $damage -= $damage*0.5;
            $this->eventAttacked['agi'] = "Esquive x 0.5";
        } else if ($agi >= 75 && $agi < 100 ) {
            $damage -= $damage*0.4;
            $this->eventAttacked['agi'] = "Esquive x 0.4";
        } else if ($agi >= 50 && $agi < 75 ) {
            $damage -= $damage*0.3;
            $this->eventAttacked['agi'] = "Esquive x 0.3";
        } else if ($agi >= 25 && $agi < 50 ) {
            $damage -= $damage*0.2;
            $this->eventAttacked['agi'] = "Esquive x 0.2";
        } else {
            $damage -= $agi;
            $this->eventAttacked['agi'] = "Esquive légere";
        }

        // LUCK
        $rand = rand(1, 100);
        if ($luck == $rand) {
            $damage = (50/100)*$damage;
            $this->eventAttacked['luck'] = "Riposte || rand : ".$rand;
        } if ($luck > $rand) {
            $damage = (25/100)*$damage;
            $this->eventAttacked['luck'] = "Blocage || rand : ".$rand;
        } else {
            $this->eventAttacked['luck'] = "Par surprise || rand : ".$rand;
        }

        // ARMOR
        if ($armor == 100 ) {
            $damage -= 10;
            $this->eventAttacked['armor'] = "Armure en diams dégat -10";
        } else if ($armor >= 75 && $armor < 100 ) {
            $damage -= 8;
            $this->eventAttacked['armor'] = "Armure lourde dégat -8";
        } else if ($armor >= 50 && $armor < 75 ) {
            $damage -= 6;
            $this->eventAttacked['armor'] = "Armure moyenne dégat -6";
        } else if ($armor >= 25 && $armor < 50 ) {
            $damage -= 4;
            $this->eventAttacked['armor'] = "Armure légere dégat -4";
        } else if ($armor > 25 && $armor < 25 ) {
            $damage -= 2;
            $this->eventAttacked['armor'] = "Armure en tissu dégat -2";
        } else {
            $this->eventAttacked['armor'] = "Vous n'avez pas d'armur";
        }

        $this->eventAttacked['damage'] = $damage;

        // Damage Function call
        $this->minusLife($perso, $damage);

    }

    public function minusLife (Personnage $perso, $damage) {
        $initLife = $perso->getLife();
        $isOk = $this->checkLife($perso, $damage);

        if(is_numeric($isOk)) {
            $this->eventAttacker['event'] = "Le héro ".$perso->name()." à été tué au combat .. :(";
            $this->manager->delete($perso);
            unset($perso);
        } else {
            $perso->setLife($initLife-$damage);
        }

    }

    public function checkLife (Personnage $perso, $damage) {
        $previsional = $perso->getLife()-$damage;
        $return = false;
        if ($previsional <= 0) {
            $return = $perso->id();
            unset($perso);
            return $return;
        }
        return $return;
    }

    /**
     * @return mixed
     */
    public function getEventAttacker()
    {
        return $this->eventAttacker;
    }

    /**
     * @return mixed
     */
    public function getEventAttacked()
    {
        return $this->eventAttacked;
    }

}

