<?php
namespace sabate\Model;
use \PDO;
if(!class_exists('Manager')){
	class Manager
	{

	    public function dbConnect()
	    {
	        $db = new \PDO('mysql:host=db745083302.db.1and1.com;dbname=db745083302;charset=utf8', 'dbo745083302', 'Patrockthebest2084!');
	        return $db;
	    }

	}


}
