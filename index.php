<?php

	function chargerClasse($classname)
	{
	  require "/Class/".$classname.'.php';
	}


    spl_autoload_register('chargerClasse');

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
			require "/Controller/HomeManager.php";
			break;

		case 'game':
			require "/Controller/GameManager.php";
			break;
			
	}

	$content = ob_get_contents();

	ob_end_clean();

	require "/View/template.php";