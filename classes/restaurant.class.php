<?php 
include_once ("db.class.php");
	class Restaurant{
		private $m_sRestaurantnaam;
		private $m_sRestaurantstraat;
		private $m_sRestaurantstad;
		private $m_sRestauranttelefoon;
		private $m_sRestauranturen;

		public function __set($p_sProperty, $p_vValue){
			switch ($p_sProperty) {
				case 'Naam':
					$this->m_sRestaurantnaam=$p_vValue;
				break;
				case 'Straat':
					$this->m_sRestaurantstraat=$p_vValue;
				break;
				case 'Stad':
					$this->m_sRestaurantstad=$p_vValue;
				break;
				case 'Telefoon':
					$this->m_sRestauranttelefoon=$p_vValue;
				break;
				case 'Uren':
					$this->m_sRestauranturen=$p_vValue;
				break;
		

			}
			
		}
	public function __get($p_sProperty){
		switch ($p_sProperty) {
			case 'Naam':
				return $this->m_sRestaurantnaam;
				break;
			case 'Straat':
				return $this->m_sRestaurantstraat;
				break;
			case 'Stad':
				return $this->m_sRestaurantstad;
				break;
			case 'Telefoon':
				return $this->m_sRestauranttelefoon;
				break;
			case 'Uren':
				return $this->m_sRestauranturen;
				break;
		}
	}

	public function Save(){
			$db = new Db();
			$sql = "insert into tblrestaurant (rest_naam, rest_straat, rest_stad, rest_telefoon, rest_openingsuren, rest_usernaam)
				VALUES (
					'" .$db->conn->real_escape_string($this->Naam) . "',
					'" .$db->conn->real_escape_string($this->Straat) . "',
					'" .$db->conn->real_escape_string($this->Stad) . "',
					'" .$db->conn->real_escape_string($this->Telefoon) . "',
					'" .$db->conn->real_escape_string($this->Uren) . "',
					'". $_SESSION['name']."'
					)";
	
			$db->conn->query($sql);
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

		public function getAllRestaurantsBezoeker()
	{
		$db = new Db();
		$sql = "SELECT * FROM `tblrestaurant`";
		$return = $db->conn->query($sql);
		while($row = mysqli_fetch_array($return))
		{
		echo "<li><a href='profile_bezoeker.php?restaurant=".$row['rest_naam']."'>" .$row['rest_naam']. "</a></li>";	
		}
		
	}

	public function getAllReserverenBezoeker()
	{
		$db = new Db();
		$sql = "SELECT * FROM `tblrestaurant`";
		$return = $db->conn->query($sql);
		while($row = mysqli_fetch_array($return))
		{
		echo "<li><a href='reservaties_bezoeker.php?restaurant=".$row['rest_naam']."'>" .$row['rest_naam']. "</a></li>";	
		}
		
	}

	public function getInfo()
	{
		$db = new Db();
		$sql = "SELECT * FROM `tblrestaurant` WHERE rest_naam = '".$_SESSION['restaurant']."'
		";
		$return = $db->conn->query($sql);
		while($row = mysqli_fetch_array($return))
		{
		echo "<li>" .$row['rest_naam']. "</li>";
		echo "<li>" .$row['rest_straat']. "</li>";	
		echo "<li>" .$row['rest_stad']. "</li>";		
		echo "<li>" .$row['rest_telefoon']. "</li>";	
		echo "<li>" .$row['rest_openingsuren']. "</li>";	
		}
		
	}





	

		
}


?>