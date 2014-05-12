<?php
include_once ("classes/Tafels.class.php");
include_once ("classes/Menus.class.php");

$feedback="";
if (isset($_POST['btncreate'])) {
	try{
	$user = new Tafels();
	$user-> Aantal2 = $_POST['Hoeveelheid2'];
	$user-> Aantal4 = $_POST['Hoeveelheid4'];
	$user-> Aantal6 = $_POST['Hoeveelheid6'];
	$user-> Aantal8 = $_POST['Hoeveelheid8'];
	$user -> Save();
	
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}

if (isset($_POST['btnvoorgerecht']))
	{
		try{
		$gerecht = new Menu();
		$gerecht-> Type = "voorgerecht";
		$gerecht-> Gerecht = $_POST['gerecht'];
		$gerecht-> GerechtPrijs = $_POST['gerechtprijs'];
		$gerecht-> Save();
		}catch (Exception $e)
		{
			$feedback=$e->getMessage();
		}
	}

	if (isset($_POST['btnhoofdgerecht']))
	{
		try{
		$gerecht = new Menu();
		$gerecht-> Type = "hoofdgerecht";
		$gerecht-> Gerecht = $_POST['gerecht'];
		$gerecht-> GerechtPrijs = $_POST['gerechtprijs'];
		$gerecht-> Save();
		}catch (Exception $e)
		{
			$feedback=$e->getMessage();
		}
	}

	if (isset($_POST['btnnagerecht']))
	{
		try{
		$gerecht = new Menu();
		$gerecht-> Type = "nagerecht";
		$gerecht-> Gerecht = $_POST['gerecht'];
		$gerecht-> GerechtPrijs = $_POST['gerechtprijs'];
		$gerecht-> Save();
		}catch (Exception $e)
		{
			$feedback=$e->getMessage();
		}
	}

	if (isset($_POST['btndrank']))
	{
		try{
		$gerecht = new Menu();
		$gerecht-> Type = "drank";
		$gerecht-> Gerecht = $_POST['gerecht'];
		$gerecht-> GerechtPrijs = $_POST['gerechtprijs'];
		$gerecht-> Save();
		}catch (Exception $e)
		{
			$feedback=$e->getMessage();
		}
	}

	// DELETE KNOPPEN
	if (!empty($_POST['btnVerwijderGerecht']))
	{
		try{
		$gerecht = new Menu();
		$gerecht->Id = $_POST['me_id'];
		$gerecht-> Delete();
		}catch (Exception $e)
		{
			$feedback=$e->getMessage();
		}
	}	


?>