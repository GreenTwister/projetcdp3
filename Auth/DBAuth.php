<?php
namespace sabate\Auth;

use \PDO;
class DBAuth {

	public function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=superbase;charset=utf8', 'ident', 'mot de passe');
        return $db;
    }


	public function login($username, $password){
		
		$db = $this->dbConnect();
		$user = $db->query('SELECT * FROM users');
		while($donnees = $user->fetch())
		{
			if($username !== $donnees['username'] || sha1($password) !== $donnees['password'])
            {
        		$errorMessage = 'Mauvais identifiants !';
        		echo $errorMessage;
        		return false;
                require ('../view/backend/templateAdmin');
      		}
        	elseif($username == $donnees['username'] && sha1($password) == $donnees['password'])
      		{
        		// On ouvre la session
        		session_start();
        		// On enregistre le login en session
        		$_SESSION['login'] = $donnees['username'];
        		// On redirige vers le fichier admin.php
        		header('Location: admin.php');
        		return $_SESSION['login'];
        		
        	}
      	}
      	$user->closeCursor();
	}

	public function logged(){

		return isset($_SESSION['login']);
   
	}
}
