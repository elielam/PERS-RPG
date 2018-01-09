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
        $fAgi = $_SESSION['character']->getAgi();
        $fStr = $_SESSION['character']->getStr();
        $fDex = $_SESSION['character']->getDex();
        $fLuck = $_SESSION['character']->getLuck();
        $fDamage = $_SESSION['character']->getDegat();

        // STRONG
        $fDamage += $fStr/10;
        $eventAttacker['str'] = "Str : ".$fStr." || PostStr : ".($fStr/10);

        // AGILITY
        if ($fAgi == 100 ) {
            $fDamage = $fDamage*2;
            $eventAttacker['agi'] = "Multiplicateur x2";
        } else if ($fAgi >= 75 && $fAgi < 100 ) {
            $fDamage = $fDamage*1.75;
            $eventAttacker['agi'] = "Multiplicateur x1.75";
        } else if ($fAgi >= 50 && $fAgi < 75 ) {
            $fDamage = $fDamage*1.5;
            $eventAttacker['agi'] = "Multiplicateur 1.5";
        } else if ($fAgi >= 25 && $fAgi < 50 ) {
            $fDamage = $fDamage*1.25;
            $eventAttacker['agi'] = "Multiplicateur x1.25";
        } else {
            $fDamage = $fDamage+$fAgi;
            $eventAttacker['agi'] = "Ajout point d'agi";
        }

        // DEXTERITY
        if ($fDex == 100 ) {
            $eventAttacker['dex'] = "Pas de perte";
        } else if ($fDex >= 80 && $fDex < 100 ) {
            $fDamage -= ($fDamage/10);
            $eventAttacker['dex'] = "Damage - Damage/10";
        } else if ($fDex >= 60 && $fDex < 80 ) {
            $fDamage -= ($fDamage/8);
            $eventAttacker['dex'] = "Damage - Damage/8";
        } else if ($fDex >= 40 && $fDex < 60 ) {
            $fDamage -= ($fDamage/6);
            $eventAttacker['dex'] = "Damage - Damage/6";
        } else if ($fDex >= 20 && $fDex < 40 ) {
            $fDamage -= ($fDamage/4);
            $eventAttacker['dex'] = "Damage - Damage/4";
        } else if ($fDex >= 0 && $fDex < 20 ) {
            $fDamage -= ($fDamage/2);
            $eventAttacker['dex'] = "Damage - Damage/2";
        }

        // LUCK
        $rand = rand(1, 100);
        if ($fLuck == $rand) {
            $fDamage += (50/100)*$fDamage;
            $eventAttacker['luck'] = "Super critique || rand : ".$rand;
        } else if ($fLuck > $rand) {
            $fDamage += (25/100)*$fDamage;
            $eventAttacker['luck'] = "Critique || rand : ".$rand;
        }

        //Test
        print_r($eventAttacker);
        echo "</br>";
        echo $fDamage;
        echo "</br>";

        $this->damage($enemy, $fDamage);

        // Damage Function call


    }

    public function damage (Personnage $perso, $damage) {

        $eventAttacked = null;
        $eventAttacked = array(
            'agi' => '',
            'luck' => '',
            'armor' => '',
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

        echo "</br>";
        print_r($eventAttacked);
        echo "</br>";
        echo $damage;

        exit();

//        $this->minusLife($perso, $damage);

    }

    public function minusLife (Personnage $perso, $damage) {
        $initLife = $perso->getLife();
        $perso->setLife($initLife-$damage);
    }

}

