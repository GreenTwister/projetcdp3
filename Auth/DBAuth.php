<?php
namespace sabate\Auth;

use \PDO;
class DBAuth {

	public function dbConnect()
    {
        $db = new \PDO('mysql:host=db745083302.db.1and1.com;dbname=db745083302;charset=utf8', 'dbo745083302', 'mot de passe');
        return $db;
    }


	public function login($username, $password){
		
		$db = $this->dbConnect();
		$user = $db->query('SELECT * FROM users');
		while($donnees = $user->fetch())
		{
			if($username !== $donnees['username'] || sha1($password) !== $donnees['password'])
            {
                ?>
                <div class="labarre">
                    <div class="alert alert-danger">
                    <strong>Mauvais identifiants !</strong>
                    </div>
                </div>
                <?php
                header("Location : index.php");
                require('view/frontend/connexion.php');
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