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
		elseif ($_GET['action'] == 'comment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					$backend = new backend();
					$listing = $backend->comment();
			}
			else {
					echo 'Erreur : aucun identifiant de commentaire envoyé';
			}
		}
			
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					if (!empty($_POST['author']) && !empty($_POST['comment'])) {
						$backend = new backend();
						$listing = $backend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
					}
					else {
						throw new Exception('Tous les champs ne sont pas remplis !');
					}
				}
				else {
					throw new Exception('Aucun identifiant de billet envoyé');
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
			$backend = new backend();
			$listing = $backend->deleteArticle($_POST['id']);
					
		}
		elseif ($_GET['action'] == 'updateArticle') {
			$backend = new backend();
			$listing = $backend->updateArticle($_POST['id'],$_POST['newtitrearticle'], $_POST['newarticle']);
					
		}
		elseif ($_GET['action'] == 'signaled') {
			$backend = new backend();
			$listing = $backend->commentSignaled($_POST['id']);
					
		}
		elseif ($_GET['action'] == 'listSignaled') {
			$backend = new backend();
			$listing = $backend->listSignaled();
					
		}
		elseif ($_GET['action'] == 'recupSignaled') {
			$backend = new backend();
			$listing = $backend->recupSignaled($_POST['id']);
					
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
