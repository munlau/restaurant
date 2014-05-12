<?php
	include('../classes/Menus.class.php');
	$g = new Menu();
	if(!empty($_POST['activitymessage']))
	{
		$g->Gerecht = $_POST['activitymessage'];
		$g->GerechtPrijs = $_POST['activitymessage2'];
		$g->Type = $_POST['type'];
		$g->Restaurant = $_POST['activitymessage3'];
		try 
		{
			$g->Save();
		} 
		catch (Exception $e) 
		{
			$feedback = $e->getMessage();
		}
	}
	echo "ok";
?>