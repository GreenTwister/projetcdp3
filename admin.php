<?php
require('controller/PostController.php');
session_start();
if(logged()){

	if(isset($_GET['action'])) {

		if ($_GET['action'] == 'connexion') {
			Connexion($_POST['login'],$_POST['password']);
					
		}
		elseif ($_GET['action'] == 'listPosts') {
				listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					post();
			}
			else {
					echo 'Erreur : aucun identifiant de billet envoyé';
			}
		}
		elseif ($_GET['action'] == 'comment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					comment();
			}
			else {
					echo 'Erreur : aucun identifiant de commentaire envoyé';
			}
		}
			
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					if (!empty($_POST['author']) && !empty($_POST['comment'])) {
						addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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
						addArticle($_POST['titrearticle'], $_POST['article']);
					}
					else {
						throw new Exception('Tous les champs ne sont pas remplis !');
					}
			
					
		}elseif ($_GET['action'] == 'delete') {
			deleteArticle($_POST['id']);
					
		}
		elseif ($_GET['action'] == 'updateArticle') {
			updateArticle($_POST['id'],$_POST['newtitrearticle'], $_POST['newarticle']);
					
		}
		elseif ($_GET['action'] == 'signaled') {
			commentSignaled($_POST['id']);
					
		}
		elseif ($_GET['action'] == 'listSignaled') {
			listSignaled();
					
		}
		elseif ($_GET['action'] == 'deleteSignaled') {
			deleteSignaled($_POST['id']);
			header ('location: admin?action=listSignaled');
					
		}elseif ($_GET['action'] == 'sessiondestroy') {
			session_destroy();
			header ('location: index.php');
					
		
		}

	}else{

			listPosts();
		}
}else{
	echo 'Accès interdit';
	?>
</br>
	<a href="index.php"> Retourner à l'accueil</a>
	<?php
}
