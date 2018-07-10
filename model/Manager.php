<?php
namespace sabate\Model;
use \PDO;
if(!class_exists('Manager')){
	class Manager
	{

	    public function dbConnect()
	    {
	        $db = new \PDO('mysql:host=localhost;dbname=superbase;charset=utf8', 'pseudo', 'mot de passe');
	        return $db;
	    }

	}


}
