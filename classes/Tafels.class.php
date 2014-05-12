<?php
	include_once("classes/Db.class.php");
	Class Tafels
	{
		private $m_sAantal2;
		private $m_sAantal4;
		private $m_sAantal6;
		private $m_sAantal8;
		private $m_iAantalgereserveerd;

		public function __set($p_sProperty, $p_vValue){
			switch ($p_sProperty) {
				case 'Aantal2':
					$this->m_sAantal2 = $p_vValue;
					break;
				case 'Aantal4':
					$this->m_sAantal4 = $p_vValue;
					break;
				case 'Aantal6':
					$this->m_sAantal6 = $p_vValue;
					break;
				case 'Aantal8':
					$this->m_sAantal8 = $p_vValue;
					break;
				case 'Aantalgereserveerd':
					$this->m_iAantalgereserveerd = $p_vValue;
					break;
			}
		}

		public function __get($p_sProperty){
			switch ($p_sProperty) {
				case 'Aantal2':
					return $this->m_sAantal2;
					break;
				case 'Aantal4':
					return $this->m_sAantal4;
					break;
				case 'Aantal6':
					return $this->m_sAantal6;
					break;
				case 'Aantal8':
					return $this->m_sAantal8;
					break;
				case 'Aantalgereserveerd':
					return $this->m_iAantalgereserveerd;
					break;
			}
		}


		public function Save(){
			$db = new Db();
			$sql = "insert into tbltafels (ta_tafel2, ta_tafel4, ta_tafel6, ta_tafel8, ta_restaurant)
				VALUES (
					'" .$db->conn->real_escape_string($this->Aantal2) . "',
					'" .$db->conn->real_escape_string($this->Aantal4) . "',
					'" .$db->conn->real_escape_string($this->Aantal6) . "',
					'" .$db->conn->real_escape_string($this->Aantal8) . "',
					'". $_SESSION['restaurant']."'
					)";

					$db->conn->query($sql);
		}

		public function Select(){
			$db = new Db();
			$sql = "SELECT * FROM `tbltafels` WHERE `ta_restaurant` = '" .$_SESSION['restaurant'] ."'";
			$result = $db->conn->query($sql);
			while($row = mysqli_fetch_array($result))
				{
					global $tafel2;
					global $tafel4;
					global $tafel6;
					global $tafel8;
					$tafel2 = $row['ta_tafel2'];
					$tafel4 = $row['ta_tafel4'];
					$tafel6 = $row['ta_tafel6'];
					$tafel8 = $row['ta_tafel8'];
				}
		}

		public function Save2(){
			global $tafel2;
			global $tafel4;
			global $tafel6;
			global $tafel8;
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new Db();
			$sql = "insert into tbloverzicht (ov_tafel2, ov_tafel4, ov_tafel6, ov_tafel8, ov_restaurant, ov_datum)
				VALUES (
					'" . $tafel2 . "',
					'" . $tafel4 . "',
					'" . $tafel6 ."',
					'" . $tafel8 ."',
					'". $_SESSION['restaurant']."',
					'". $theDate ."'
					)";
			$check = "SELECT * FROM tbloverzicht 
			WHERE ov_datum = '".$theDate."'
			AND ov_restaurant = '".$_SESSION['restaurant']."'
				;";
			$result = $db->conn->query($check);
				if($result->num_rows == 0)
				{
					$db->conn->query($sql);
				}
		}

		public function ReserverenTafel2(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new Db();
			$sql = "insert into tblreservaties (re_tafel2, re_restaurant, re_username, re_datum)
				VALUES (
					" .$db->conn->real_escape_string($this->Aantalgereserveerd) . ",
					'". $_SESSION['restaurant']."',
					'". $_SESSION['name']."',
					'". $theDate ."'
					)";
					$db->conn->query($sql);
					
		}


		public function ReserverenTafel4(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new Db();
			$sql = "insert into tblreservaties (re_tafel4, re_restaurant, re_username, re_datum)
				VALUES (
					'" .$db->conn->real_escape_string($this->Aantalgereserveerd) . "',
					'". $_SESSION['restaurant']."',
					'". $_SESSION['name']."',
					'". $theDate ."'
					)";

					$db->conn->query($sql);
		}
		public function ReserverenTafel6(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new Db();
			$sql = "insert into tblreservaties (re_tafel6, re_restaurant, re_username, re_datum)
				VALUES (
					'" .$db->conn->real_escape_string($this->Aantalgereserveerd) . "',
					'". $_SESSION['restaurant']."',
					'". $_SESSION['name']."',
					'". $theDate ."'
					)";

					$db->conn->query($sql);
		}
		public function ReserverenTafel8(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new Db();
			$sql = "insert into tblreservaties (re_tafel8, re_restaurant, re_username, re_datum)
				VALUES (
					" .$db->conn->real_escape_string($this->Aantalgereserveerd) . ",
					'". $_SESSION['restaurant']."',
					'". $_SESSION['name']."',
					'". $theDate ."'
					)";
					$db->conn->query($sql);
		}


		public function som2(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` WHERE `re_tafel2` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."' 
			AND `re_datum` = '" .$theDate."' 
			";
			$result = $db->conn->query($sql2);
			global $num_rows2;
			$num_rows2 = mysqli_num_rows($result);
		}

		public function som4(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` 
			WHERE `re_tafel4` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `re_datum` = '" .$theDate."' 
			";
			$result = $db->conn->query($sql2);
			global $num_rows4;
			$num_rows4 = mysqli_num_rows($result);
		}

		public function som6(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` 
			WHERE `re_tafel6` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `re_datum` = '" .$theDate."' 
			";
			$result = $db->conn->query($sql2); 
			global $num_rows6;
			$num_rows6 = mysqli_num_rows($result);
		}

		public function som8(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` 
			WHERE `re_tafel8` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `re_datum` = '" .$theDate."' 
			";
			$result = $db->conn->query($sql2);
			global $num_rows8;
			$num_rows8 = mysqli_num_rows($result);
		}

		public function gereserveerd2(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` 
			WHERE `re_tafel2` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."' 
			AND `re_datum` = '" .$theDate."' 
			";
			$result = $db->conn->query($sql2);
			global $num_rows2;
			$num_rows2 = mysqli_num_rows($result);
			if($num_rows2 == 1)
			{
				echo "<h4 class='box-title'>/ Er is al " . $num_rows2 . " tafel van 2 gereserveerd</h4>";
			}
			else
			{
				echo "<h4 class='box-title'>/ Er zijn al " . $num_rows2 . " tafels van 2 gereserveerd</h4>";
			}
		}

		public function gereserveerd4(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` 
			WHERE `re_tafel4` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `re_datum` = '" .$theDate."'
			";
			$result = $db->conn->query($sql2);
			global $num_rows4;
			$num_rows4 = mysqli_num_rows($result);
			if($num_rows4 == 1)
			{
				echo "<h4 class='box-title'>/ Er is al " . $num_rows4 . " tafel van 4 gereserveerd</h4>";
			}
			else
			{
				echo "<h4 class='box-title'>/ Er zijn al " . $num_rows4 . " tafels van 4 gereserveerd</h4>";
			}
		}

		public function gereserveerd6(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` WHERE `re_tafel6` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `re_datum` = '" .$theDate."'
			";
			$result = $db->conn->query($sql2);
			global $num_rows6;
			$num_rows6 = mysqli_num_rows($result);
			if($num_rows6 == 1)
			{
				echo "<h4 class='box-title'>/ Er is al " . $num_rows6 . " tafel van 6 gereserveerd</h4>";
			}
			else
			{
				echo "<h4 class='box-title'>/ Er zijn al " . $num_rows6 . " tafels van 6 gereserveerd</h4>";
			}
			
		}
		
		public function gereserveerd8(){
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			$db = new db();
			$sql2 = "SELECT * FROM `tblreservaties` WHERE `re_tafel8` = 1 
			AND `re_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `re_datum` = '" .$theDate."'
			";
			$result = $db->conn->query($sql2);
			global $num_rows8;
			$num_rows8 = mysqli_num_rows($result);
			if($num_rows8 == 1)
			{
				echo "<h4 class='box-title'>/ Er is al " . $num_rows8 . " tafel van 8 gereserveerd</h4>";
			}
			else
			{
				echo "<h4 class='box-title'>/ Er zijn al " . $num_rows8 . " tafels van 8 gereserveerd</h4>";
			}
		}

		public function getAllTafels2()
		{
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			global $num_rows2;
			$db = new db();
			$sql = "SELECT * FROM `tbloverzicht` 
			WHERE `ov_restaurant` = '" . $_SESSION['restaurant'] ."' 
			AND `ov_datum` = '" . $theDate . "'
			";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$aantal = $row['ov_tafel2'];
					$totaal = $aantal - $num_rows2;
					for ($i = 1; $i <= $totaal; $i++) {
					    echo "<tr><td><input type='submit' class='pull-right btn btn-default' name='btnreserveren2' value='reserveren'>" . "Tafel van 2" . "</input></td></tr>";
					}
				}

		}

		public function getAllTafels4()
		{
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			global $num_rows4;
			$db = new Db();
			$sql = "SELECT * FROM `tbloverzicht` 
			WHERE `ov_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `ov_datum` = '" . $theDate . "'
			";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$aantal = $row['ov_tafel4'];
					$totaal = $aantal - $num_rows4;
					for ($i = 1; $i <= $totaal; $i++) {
					    echo "<tr><td><input type='submit' class='pull-right btn btn-default' name='btnreserveren4' value='reserveren'>" . "Tafel van 4" . "</td></tr>";
					}
				}

		}

		public function getAllTafels6()
		{
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			global $num_rows6;
			$db = new Db();
			$sql = "SELECT * FROM `tbloverzicht`
			WHERE `ov_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `ov_datum` = '" . $theDate . "'
			";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$aantal = $row['ov_tafel6'];
					$totaal = $aantal - $num_rows6;
					for ($i = 1; $i <= $totaal; $i++) {
					    echo "<tr><td><input type='submit' class='pull-right btn btn-default' name='btnreserveren6' value='reserveren'>" . "Tafel van 6" . "</td></tr>";
					}
				}

		}

		public function getAllTafels8()
		{
			$theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
			global $num_rows8;
			$db = new Db();
			$sql = "SELECT * FROM `tbloverzicht` 
			WHERE `ov_restaurant` = '" .$_SESSION['restaurant'] ."'
			AND `ov_datum` = '" . $theDate . "'
			";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$aantal = $row['ov_tafel8'];
					$totaal = $aantal - $num_rows8;
					for ($i = 1; $i <= $totaal; $i++) {
					    echo "<tr><td><input type='submit' class='pull-right btn btn-default' name='btnreserveren8' value='reserveren'>" . "Tafel van 8" . "</td></tr>";
					}
				}

		}
		
		public function getAllRestaurants()
		{
		$db = new Db();
		$sql = "SELECT * FROM `tblrestaurant` WHERE rest_usernaam = '".$_SESSION['name']."'";
		$return = $db->conn->query($sql);
		while($row = mysqli_fetch_array($return))
		{
		echo "<li><a href='profile.php?restaurant=".$row['rest_naam']."'>" .$row['rest_naam']. "</a></li>";	
		}
		
		}	

		public function getAllRestaurantsReserveren()
		{
		$db = new Db();
		$sql = "SELECT * FROM `tblrestaurant` WHERE rest_usernaam = '".$_SESSION['name']."'";
		$return = $db->conn->query($sql);
		while($row = mysqli_fetch_array($return))
		{
		echo "<li><a href='reservaties.php?restaurant=".$row['rest_naam']."'>" .$row['rest_naam']. "</a></li>";	
		}
		
		}	

		public function getAllRestaurantsBezoeker()
		{
		$db = new Db();
		$sql = "SELECT * FROM `tblrestaurant` ";
		$return = $db->conn->query($sql);
		while($row = mysqli_fetch_array($return))
		{
		echo "<li><a href='reservaties_bezoeker.php?restaurant=".$row['rest_naam']."'>" .$row['rest_naam']. "</a></li>";	
		}

	
		


		}	

	}
?>