<?php
include_once ("classes/Tafels.class.php");


$feedback="";
if (isset($_POST['btnreserveren2'])) {
	try{
	$user = new Tafels();
	$user-> Aantalgereserveerd = 1;
	$user -> ReserverenTafel2();
	
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}
if (isset($_POST['btnreserveren4'])) {
	try{
	$user = new Tafels();
	$user-> Aantalgereserveerd = 1;
	$user -> ReserverenTafel4();
	
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}
if (isset($_POST['btnreserveren6'])) {
	try{
	$user = new Tafels();
	$user-> Aantalgereserveerd = 1;
	$user -> ReserverenTafel6();
	
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}
if (isset($_POST['btnreserveren8'])) {
	try{
	$user = new Tafels();
	$user-> Aantalgereserveerd = 1;
	$user -> ReserverenTafel8();
	
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}


?>