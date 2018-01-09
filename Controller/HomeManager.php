<?php

$error = null;
$gameManager = new GameManager();

if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else { 
	$action = 'default'; 
}

switch ($action) {
	case "signout":

		unset($_SESSION["character"]);
		session_destroy();

		break;

    case "hit":

        if(isset($_REQUEST['enemy'])) {
            $enemyId = $_REQUEST['enemy'];
        } else {
            $enemyId = "null";
        }
        $enemy = $manager->get((int)$enemyId);
        $gameManager->hit($enemy);
        $manager->update($enemy);
        $eventAttacker = $gameManager->getEventAttacker();
        $eventAttacked = $gameManager->getEventAttacked();

        break;

	default:
		# code...
		break;
}

// GENERIC STUFF
// ##########################################################################################################



// SIGNUP
// ##########################################################################################################

if (isset($_POST['createBtn'])) {

    $characterName = $_POST['nameField'];

    if(isset($_POST['typeField'])) {
        $characterType = $_POST['typeField'];
    } else {
        $characterType = "Fighter";
    }

    if ($manager->exist($characterName) === false) {

        $data = array(
            "name" => $characterName,
            "type" => $characterType,
        );

        $character = new $characterType($data);

            if ($character->nameIsValid() === true) {

                $manager->add($character);
                $_SESSION['character'] = $character;

            } else {

                $error = array(
                    'type' => "Signin error !",
                    'class' => "alert-danger",
                    'message' => "The nickname you have entered is seem to not be valid, please choose an other one (Every char is valid , maxlenght : 50 , can't be empty).",
                );

            }

    } else {

        $error = array(
            'type' => "Signin error !",
            'class' => "alert-danger",
            'message' => "The nickname you have entered is seem to be already used, please choose an other one or load this one.",
        );

    }

}

// LOGIN
// ##########################################################################################################

if (isset($_POST['loadBtn'])) {

    $characterName = $_POST['nameField'];

    if ($manager->exist($characterName) === true) {

        $_SESSION['character'] = $manager->get($characterName);

    } else {

        $error = array(
            'type' => "Login error !",
            'class' => "alert-danger",
            'message' => "The nickname you have entered is seem to not exist, please choose an other one or create this one.",
        );

    }

}

if ($error == null) {
    $error = array(
        'type' => "Welcome to RPGame !",
        'class' => "alert-info",
        'message' => "Load or create an account to play at our game.",
    );
}

// INJECT VIEW
// ##########################################################################################################

if ($_SESSION == null) {
	require "/View/login.html";
} else {
    $characters = $manager->getList($_SESSION["character"]->name());
    $characterUpt = $_SESSION['character']->name();
    $_SESSION['character'] = $manager->get($characterUpt);
	require "/View/home.html";
}

