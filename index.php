<?php
// Ceci est mon index
require('controller/frontend.php');
//try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			$frontend = new frontend();
			$listing = $frontend->listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$frontend = new frontend();
				$listing = $frontend->post();
				
			}
			else {
				echo 'Erreur : aucun identifiant de billet envoyé';
			}
		}
		elseif ($_GET['action'] == 'comment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$frontend = new frontend();
				$listing = $frontend->comment();
				
			}
			else {
				echo 'Erreur : aucun identifiant de commentaire envoyé';
			}
		}
		
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					$frontend = new frontend();
					$listing = $frontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
					
				}
				else {
					throw new Exception('Tous les champs ne sont pas remplis !');
				}
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		
		elseif ($_GET['action'] == 'login') {
			
			require('view/frontend/connexion.php');
			
		}
		elseif ($_GET['action'] == 'signaled') {
				$frontend = new frontend();
				$listing = $frontend->commentSignaled($_POST['id']);
					
		}
		elseif ($_GET['action'] == 'connexion') {
			$frontend = new frontend();
			$listing = $frontend->Connexion($_POST['login'],$_POST['password']);
			

		}	
	}
	else {
		$frontend = new frontend();
		$listing = $frontend->listPosts();
		

	}
/*}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
	
	 $errorMessage = $e->getMessage();
    require('view/errorView.php');
}*/