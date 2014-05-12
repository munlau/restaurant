<?php
	include('../classes/Menus.class.php');

	$g = new Menu();
	if(!empty($_POST['gerechten']))
	{

		$g->Gerecht = $_POST['gerechten'];
		$available = $g->GerechtAvailable();

		if($available === false)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}

	}
?>