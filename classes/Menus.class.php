<?php
	include_once("db.class.php");
	Class Menu
	{
		private $m_sId;
		private $m_sGerecht;
		private $m_sGerechtPrijs;
		private $m_sType;
		private $m_sRestaurant;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'Id':
					$this->m_sId = $p_vValue;
					break;
				case 'Gerecht':
					$this->m_sGerecht = $p_vValue;
					break;
				case 'GerechtPrijs':
					$this->m_sGerechtPrijs = $p_vValue;
					break;
				case 'Type':
					$this->m_sType = $p_vValue;
					break;
				case 'Restaurant':
					$this->m_sRestaurant = $p_vValue;
					break;				
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) 
			{
				case 'Id':
					return $this->m_sId;
					break;
				case 'Gerecht':
					return $this->m_sGerecht;
					break;
				case 'GerechtPrijs':
					return $this->m_sGerechtPrijs;
					break;
				case 'Type':
					return $this->m_sType;
					break;
				case 'Restaurant':
					return $this->m_sRestaurant;
					break;		
			}
		}

		public function GerechtAvailable()
		{
			//checken of username al in de db zit
			$db = new Db();
			$sql = "select * from tblmenus where me_naam = '".$db->conn->real_escape_string($this->Gerecht)."';";
			$result = $db->conn->query($sql);
			if($result)
			{
				if(mysqli_num_rows($result) === 0)
				{
					$available = true;
					

				}
				else
				{
					$available = false;
					
				}
			}

			return $available;


		}

		public function Save(){
			$db = new Db();
			$sql = "insert into tblmenus (me_type, me_naam, me_prijs, me_restaurant)
				VALUES (
					'" . $db->conn->real_escape_string($this->Type) . "',
					'" . $db->conn->real_escape_string($this->Gerecht) . "',
					'" . $db->conn->real_escape_string($this->GerechtPrijs) . "',
					'" . $_SESSION['restaurant'] . "'
					)";
					$db->conn->query($sql);			
		}

		public function getAllVoorgerechten()
		{
			$db = new Db();
			$sql = "select * from `tblmenus` where `me_restaurant` = '" . $_SESSION['restaurant'] . "'
			and `me_type` = 'voorgerecht'";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$id = $row['me_id'];
					$aantal = $row['me_naam'];
					echo "
							<form method='post' action=''>
							<input type='hidden' name='me_id' value='". $id ."'>
							<div class ='box-body' id=". $id .">
								<div class='row'>
								<div class='col-xs-3'>" . $row['me_naam'] . "</div><div class='col-xs-4'> ".
								 "€". $row['me_prijs'] . "</div>
								 <div class='col-xs-5'><input type='submit' class='pull-right btn2 btn-default' id='btnVerwijderGerecht' name='btnVerwijderGerecht' value='Verwijder gerecht' />
							</div>
							</div>
							</div>	
							</form>
							
							";

				}
		}

		public function getAllHoofdgerechten()
		{
			$db = new Db();
			$sql = "select * from `tblmenus` where `me_restaurant` = '" . $_SESSION['restaurant'] . "'
			and `me_type` = 'hoofdgerecht'";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$id = $row['me_id'];
					$aantal = $row['me_naam'];
					echo "
							<form method='post' action=''>
							<input type='hidden' name='me_id' value='". $id ."'>
							<div class ='box-body' id=". $id .">
								<div class='row'>
								<div class='col-xs-3'>" . $row['me_naam'] . "</div><div class='col-xs-4'> ".
								 "€". $row['me_prijs'] . "</div>
								 <div class='col-xs-5'><input type='submit' class='pull-right btn2 btn-default' id='btnVerwijderGerecht' name='btnVerwijderGerecht' value='Verwijder gerecht' />
							</div>
							</div>
							</div>	
							</form>
							
							";

				}
		}

		public function getAllNagerechten()
		{
			$db = new Db();
			$sql = "select * from `tblmenus` where `me_restaurant` = '" . $_SESSION['restaurant'] . "'
			and `me_type` = 'nagerecht'";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$id = $row['me_id'];
					$aantal = $row['me_naam'];
					echo "
							<form method='post' action=''>
							<input type='hidden' name='me_id' value='". $id ."'>
							<div class ='box-body' id=". $id .">
								<div class='row'>
								<div class='col-xs-3'>" . $row['me_naam'] . "</div><div class='col-xs-4'> ".
								 "€". $row['me_prijs'] . "</div>
								 <div class='col-xs-5'><input type='submit' class='pull-right btn2 btn-default' id='btnVerwijderGerecht' name='btnVerwijderGerecht' value='Verwijder gerecht' />
							</div>
							</div>
							</div>	
							</form>
							
							";

				}
		}

		public function getAllDranken()
		{
			$db = new Db();
			$sql = "select * from `tblmenus` where `me_restaurant` = '" . $_SESSION['restaurant'] . "'
			and `me_type` = 'drank'";
			$return = $db->conn->query($sql);
				while($row = mysqli_fetch_array($return))
				{
					$id = $row['me_id'];
					$aantal = $row['me_naam'];
					echo "
							<form method='post' action=''>
							<input type='hidden' name='me_id' value='". $id ."'>
							<div class ='box-body' id=". $id .">
								<div class='row'>
								<div class='col-xs-3'>" . $row['me_naam'] . "</div><div class='col-xs-4'> ".
								 "€". $row['me_prijs'] . "</div>
								 <div class='col-xs-5'><input type='submit' class='pull-right btn2 btn-default' id='btnVerwijderGerecht' name='btnVerwijderGerecht' value='Verwijder gerecht' />
							</div>
							</div>
							</div>	
							</form>
							
							";

				}
		}

		public function Delete()
		{
			$db = new Db();
			$me_id = $this->Id;
			$sql = "DELETE FROM tblmenus WHERE me_id='$me_id'";
			$db->conn->query($sql);
		}

		public function getAllRestaurants()
		{
			$db = new Db();
			$sql = "SELECT * FROM `tblrestaurant` WHERE rest_usernaam = '".$_SESSION['name']."'";
			$return = $db->conn->query($sql);
			while($row = mysqli_fetch_array($return))
			{
			echo "<li><a href='menus.php?restaurant=".$row['rest_naam']."'>" .$row['rest_naam']. "</a></li>";	
			}
		
		}	

	}
?>