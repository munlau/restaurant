<?php
include_once ("classes/Tafels.class.php");


$feedback="";

if (isset($_POST['createTafels'])){
	$user = new Tafels();
	$user -> Select();
	$user -> Save2();
}
?>