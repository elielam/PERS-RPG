<?php

    function __autoload($class_name) {
        include 'class/' . $class_name . '.php';
    }

    $db = new PDO('mysql:host=localhost;dbname=app_rpg','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $manager = new PersonnagesManager($db);

	session_start();


	if (isset ($_POST['page'])) {
		$page = $_POST['page'];
	} else {
		$page = "home";
	}

	ob_start();

	switch ($page) {

		case 'home':
			require "controller/HomeManager.php";
			break;
			
	}

	$content = ob_get_contents();

	ob_end_clean();

	require "view/template.php";