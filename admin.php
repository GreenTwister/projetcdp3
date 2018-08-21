<?php
// Voilà un nouveau commentaire
require('controller/backend.php');
session_start();
$log = new backend();
if($log->logged()){

	if(isset($_GET['action'])) {

		if ($_GET['action'] == 'listPosts') {
				$backend = new backend();
				$listing = $backend->listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					$backend = new backend();
					$listing = $backend->post();
			}
			else {
					echo 'Erreur : aucun identifiant de billet envoyé';
			}
		}
	
		elseif ($_GET['action'] == 'addArticle') {
			if (!empty($_POST['titrearticle']) && !empty($_POST['article'])) {
						$backend = new backend();
						$listing = $backend->addArticle($_POST['titrearticle'], $_POST['article']);
					}
					else {
						throw new Exception('Tous les champs ne sont pas remplis !');
					}
			
					
		}elseif ($_GET['action'] == 'delete') {
			if(isset($_POST['id'])){

				$backend = new backend();
				$listing = $backend->deleteArticle($_POST['id']);
			}
			else{
				throw new Exception('Impossible de supprimer');
			}
					
		}
		elseif ($_GET['action'] == 'updateArticle') {
			if(isset($_POST['id'],$_POST['newtitrearticle'], $_POST['newarticle'])){

				$backend = new backend();
				$listing = $backend->updateArticle($_POST['id'],$_POST['newtitrearticle'], $_POST['newarticle']);
			}
			else{
				throw new Exception('Impossible de modifier');
			}
			
					
		}	
		
		elseif ($_GET['action'] == 'listSignaled') {
			$backend = new backend();
			$listing = $backend->listSignaled();
					
		}
		elseif ($_GET['action'] == 'recupSignaled') {

			if(isset($_POST['id'])){

				$backend = new backend();
				$listing = $backend->recupSignaled($_POST['id']);
			}
			else{
				throw new Exception('Impossible d\'afficher les commentaires signalés');
			}
			
					
		}
		elseif ($_GET['action'] == 'deleteSignaled') {
			$backend = new backend();
			$listing = $backend->deleteSignaled($_POST['id']);
			header ('location: admin?action=listSignaled');
					
		}elseif ($_GET['action'] == 'sessiondestroy') {
			session_destroy();
			header ('location: index.php');
					
		
		}

	}else{

			$backend = new backend();
			$listing = $backend->listPosts();
		}
}else{
	echo 'Accès interdit';
	?>
</br>
	<a href="index.php"> Retourner à l'accueil</a>
	<?php
}
