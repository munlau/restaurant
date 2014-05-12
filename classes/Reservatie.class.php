<?php
	include_once("classes/Db.class.php");
	Class Menu
	{
		private $m_sId;
		private $m_sGerecht;
		private $m_sGerechtPrijs;
		private $m_sType;

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
			}
		}



		public function getAllRestaurants()
		{
			$db = new Db();
			$sql = "SELECT * FROM `tblrestaurant`";
			$return = $db->conn->query($sql);
			while($row = mysqli_fetch_array($return))
			{
			echo "<li><a href='reservaties.php?restaurant=".$row['rest_naam']."'>" .$row['rest_naam']. "</a></li>";	
			}
		}


	}
?>