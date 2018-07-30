<?php
// Chargement des classes
require('model/PostManager.php');
require('model/CommentManager.php');
require('Auth/DBAuth.php');

class frontend
{
    public function listPosts()
    {
        $postManager = new sabate\Model\PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
        require('view/frontend/listPostsView.php');
    }

    public function post()
    {
        $postManager = new sabate\Model\PostManager();
        $commentManager = new sabate\Model\CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }

    public function comment()
    {
        $commentManager = new sabate\Model\CommentManager();

        $comment = $commentManager->getComment($_GET['id']);

        require('view/frontend/commentView.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new sabate\Model\CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function commentSignaled($id)
    {
        $commentManager = new sabate\Model\CommentManager();
        $affectedLines = $commentManager->signaled($id);
        if ($affectedLines === true ) {
            
            header('Location: index.php'); 
        }
        else {
            throw new Exception('Impossible de signaler le commentaire !');
        }
    }

    public function Connexion($username, $password)
    {
        $user = new sabate\Auth\DBAuth(); // Création d'un objet
        $connexion = $user->login($username, $password); // Appel d'une fonction de cet objet
        return $connexion;
    }
}
