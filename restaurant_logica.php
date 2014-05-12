<?php
include_once ("classes/restaurant.class.php");


$feedback="";
if (isset($_POST['btntoevoegen'])) {
	try{
	$restaurant = new Restaurant();
	$restaurant -> Naam = $_POST['restaurantnaam'];
	$restaurant -> Straat = $_POST['restaurantstraat'];
	$restaurant -> Stad = $_POST['restaurantstad'];
	$restaurant -> Telefoon = $_POST['restauranttelefoon'];
	$restaurant -> Uren = $_POST['restauranturen'];
	$restaurant -> Save();
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}

?>