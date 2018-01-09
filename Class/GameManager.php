<?php

class GameManager {

    public function hit(Personnage $enemy) {
        // LINK TO FUNCTION WORK
        // NEED TO DEV METHOD OF HIT FUNCTION
        // RETURN int $damage

        // ############################################################# //

        $eventAttacker = null;
        $eventAttacker = array(
          'str' => '',
          'agi' => '',
          'dex' => '',
          'luck' => 'Pas de critique',
          'armor' => '',
          'damage' => '',
        );

        // Attacker
        $agi = $_SESSION['character']->getAgi();
        $str = $_SESSION['character']->getStr();
        $dex = $_SESSION['character']->getDex();
        $luck = $_SESSION['character']->getLuck();
        $damage = $_SESSION['character']->getDegat();

        // STRONG
        $damage += $str/10;
        $eventAttacker['str'] = "Str : ".$str." || PostStr : ".($str/10);

        // AGILITY
        if ($agi == 100 ) {
            $damage = $damage*2;
            $eventAttacker['agi'] = "Multiplicateur x2";
        } else if ($agi >= 75 && $agi < 100 ) {
            $damage = $damage*1.75;
            $eventAttacker['agi'] = "Multiplicateur x1.75";
        } else if ($agi >= 50 && $agi < 75 ) {
            $damage = $damage*1.5;
            $eventAttacker['agi'] = "Multiplicateur 1.5";
        } else if ($agi >= 25 && $agi < 50 ) {
            $damage = $damage*1.25;
            $eventAttacker['agi'] = "Multiplicateur x1.25";
        } else {
            $damage = $damage+$agi;
            $eventAttacker['agi'] = "Ajout point d'agi";
        }

        // DEXTERITY
        if ($dex == 100 ) {
            $eventAttacker['dex'] = "Pas de perte";
        } else if ($dex >= 80 && $dex < 100 ) {
            $damage -= ($damage/10);
            $eventAttacker['dex'] = "Damage - Damage/10";
        } else if ($dex >= 60 && $dex < 80 ) {
            $damage -= ($damage/8);
            $eventAttacker['dex'] = "Damage - Damage/8";
        } else if ($dex >= 40 && $dex < 60 ) {
            $damage -= ($damage/6);
            $eventAttacker['dex'] = "Damage - Damage/6";
        } else if ($dex >= 20 && $dex < 40 ) {
            $damage -= ($damage/4);
            $eventAttacker['dex'] = "Damage - Damage/4";
        } else if ($dex >= 0 && $dex < 20 ) {
            $damage -= ($damage/2);
            $eventAttacker['dex'] = "Damage - Damage/2";
        }

        // LUCK
        $rand = rand(1, 100);
        if ($luck == $rand) {
            $damage += (50/100)*$damage;
            $eventAttacker['luck'] = "Super critique || rand : ".$rand;
        } else if ($luck > $rand) {
            $damage += (25/100)*$damage;
            $eventAttacker['luck'] = "Critique || rand : ".$rand;
        }

        $eventAttacker['damage'] = $damage;

        print_r($eventAttacker);
        echo "</br>";

        // Damage Function call
        $this->damage($enemy, $damage);

    }

    public function damage (Personnage $perso, $damage) {

        $eventAttacked = null;
        $eventAttacked = array(
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
            $eventAttacked['agi'] = "Esquive x 0.5";
        } else if ($agi >= 75 && $agi < 100 ) {
            $damage -= $damage*0.4;
            $eventAttacked['agi'] = "Esquive x 0.4";
        } else if ($agi >= 50 && $agi < 75 ) {
            $damage -= $damage*0.3;
            $eventAttacked['agi'] = "Esquive x 0.3";
        } else if ($agi >= 25 && $agi < 50 ) {
            $damage -= $damage*0.2;
            $eventAttacked['agi'] = "Esquive x 0.2";
        } else {
            $damage -= $agi;
            $eventAttacked['agi'] = "Esquive légere";
        }

        // LUCK
        $rand = rand(1, 100);
        if ($luck == $rand) {
            $damage = (50/100)*$damage;
            $eventAttacked['luck'] = "Riposte || rand : ".$rand;
        } if ($luck > $rand) {
            $damage = (25/100)*$damage;
            $eventAttacked['luck'] = "Blocage || rand : ".$rand;
        } else {
            $eventAttacked['luck'] = "Par surprise || rand : ".$rand;
        }

        // ARMOR
        if ($armor == 100 ) {
            $damage -= 10;
            $eventAttacked['armor'] = "Armure en diams dégat -10";
        } else if ($armor >= 75 && $armor < 100 ) {
            $damage -= 8;
            $eventAttacked['armor'] = "Armure lourde dégat -8";
        } else if ($armor >= 50 && $armor < 75 ) {
            $damage -= 6;
            $eventAttacked['armor'] = "Armure moyenne dégat -6";
        } else if ($armor >= 25 && $armor < 50 ) {
            $damage -= 4;
            $eventAttacked['armor'] = "Armure légere dégat -4";
        } else if ($armor > 25 && $armor < 25 ) {
            $damage -= 2;
            $eventAttacked['armor'] = "Armure en tissu dégat -2";
        } else {
            $eventAttacked['armor'] = "Vous n'avez pas d'armur";
        }

        $eventAttacked['damage'] = $damage;

        echo "</br>";
        print_r($eventAttacked);

        // Damage Function call
        $this->minusLife($perso, $damage);

    }

    public function minusLife (Personnage $perso, $damage) {
        $initLife = $perso->getLife();
        $perso->setLife($initLife-$damage);
    }

}

