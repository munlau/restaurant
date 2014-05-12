<?php 
include_once ("db.class.php");
	class User{
		private $m_sUsername;
		private $m_sVoornaam;
		private $m_sAchternaam;
		private $m_iTelefoon;
		private $m_sEmail;
		private $m_sPassword;
		private $m_sFunctie;
		
		public function __set($p_sProperty, $p_vValue){
			switch ($p_sProperty) {
				case 'Username':
				if(empty($p_vValue)){
					throw new Exception ('please fill in your username');
				}
				else{
					$this->m_sUsername=$p_vValue;
				}
				break;
				case 'Voornaam':
					$this->m_sVoornaam=$p_vValue;
				break;
				case 'Achternaam':
					$this->m_sAchternaam=$p_vValue;
				break;
				case 'Telefoon':
					$this->m_iTelefoon=$p_vValue;
				break;
				case 'Email':
					$this->m_sEmail=$p_vValue;
				break;
				case 'Password':
					$this->m_sPassword=$p_vValue;
				break;
				case 'Functie':
					$this->m_sFunctie=$p_vValue;
				break;

			}
			
		}
	public function __get($p_sProperty){
		switch ($p_sProperty) {
			case 'Username':
				return $this->m_sUsername;
				break;
			case 'Voornaam':
				return $this->m_sVoornaam;
				break;
			case 'Achternaam':
				return $this->m_sAchternaam;
				break;
			case 'Telefoon':
				return $this->m_iTelefoon;
				break;
			case 'Email':
				return $this->m_sEmail;
				break;
			case 'Password':
				return $this->m_sPassword;
				break;
			case 'Functie':
				return $this->m_sFunctie;
				break;
		}
	}

	public function UsernameAvailable()
	{
		//checken of username al in de db zit
		$db = new Db();
		$sql = "select * from tblusers where us_username = '".$db->conn->real_escape_string($this->Username)."';";
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
				$this->errors['errorAvailable'] = 'We kunnen deze username niet opslagen!';
			}
		}

		return $available;


	}

	public function Save(){
			$db = new Db();
			$salt = "fsldkfjsdmlfksdlmfk65463321!lksdfjlksdjf+65+65%é#fsdlkfj@";
			$sql = "insert into tblusers (us_username, us_voornaam, us_achternaam, us_telefoon, us_email, us_password, us_functie)
				VALUES (
					'" .$db->conn->real_escape_string($this->Username) . "',
					'" .$db->conn->real_escape_string($this->Voornaam) . "',
					'" .$db->conn->real_escape_string($this->Achternaam) . "',
					'" .$db->conn->real_escape_string($this->Telefoon) . "',
					'" .$db->conn->real_escape_string($this->Email) . "',
					'". $db->conn->real_escape_string(md5($this->Password . $salt)) . "',
					'" .$db->conn->real_escape_string($this->Functie) . "'
					)";
			


			$check = "SELECT * FROM tblusers WHERE us_username='"
				.$db -> conn -> real_escape_string($this -> Username)."';";
			$result = $db->conn->query($check);
				if($result->num_rows == 0)
				{
					if ($this->Functie == "houder")
					{
						$db->conn->query($sql);
						$_SESSION['loggedin'] = true;
						$_SESSION['name'] = $this->Username;
						$_SESSION['functie'] = $this->Functie;
						header("Location: index.php");
					}
					if ($this->Functie == "klant")
					{
						$db->conn->query($sql);
						$_SESSION['loggedin'] = true;
						$_SESSION['name'] = $this->Username;
						$_SESSION['functie'] = $this->Functie;
						header("Location: index_bezoeker.php");
					}
				}
				else
				{
					throw new Exception("This username is already taken!");
				}

	}

	public function canLogin() 
	{
		if($this->Functie == 'houder')
		{
			$salt = "fsldkfjsdmlfksdlmfk65463321!lksdfjlksdjf+65+65%é#fsdlkfj@";
			$db=new Db();
			$sql="SELECT * FROM tblusers WHERE us_username='"
			.$db -> conn -> real_escape_string($this -> Username)."' 
			AND us_password='"
			.$db -> conn -> real_escape_string(md5($this -> Password . $salt))."'
			AND us_functie='"
			.$db -> conn -> real_escape_string($this -> Functie)."' 
			;";
			
			$result=$db->conn->query($sql);
			if($result->num_rows == 1)
				{
						$_SESSION['loggedin'] = true;
						$_SESSION['name'] = $this -> Username;
						$_SESSION['functie'] = $this-> Functie;
						header("Location: index.php");
				
				}
		}	
			
		if($this->Functie == 'klant')
		{
			$salt = "fsldkfjsdmlfksdlmfk65463321!lksdfjlksdjf+65+65%é#fsdlkfj@";
			$db=new Db();
			$sql="SELECT * FROM tblusers WHERE us_username='"
			.$db -> conn -> real_escape_string($this -> Username)."' 
			AND us_password='"
			.$db -> conn -> real_escape_string(md5($this -> Password . $salt))."'
			AND us_functie='"
			.$db -> conn -> real_escape_string($this -> Functie)."' 
			;";
			
			$result=$db->conn->query($sql);
			if($result->num_rows == 1)
				{
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $this -> Username;
				$_SESSION['functie'] = $this-> Functie;
				header("Location: index_bezoeker.php");
				}
		}			
	}


	

		
}


?>