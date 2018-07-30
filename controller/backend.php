<?php
// Chargement des classes
require('controller/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('Auth/DBAuth.php');

class backend extends frontend{

    public function listPosts()
    {
        $postManager = new sabate\Model\PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

        require('view/backend/listPostsView.php');
    }

    public function post()
    {
        $postManager = new sabate\Model\PostManager();
        $commentManager = new sabate\Model\CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/backend/postView.php');
    }

    public function comment()
    {
       
        $commentManager = new sabate\Model\CommentManager();

        $comment = $commentManager->getComment($_GET['id']);

        require('view/backend/commentView.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new sabate\Model\CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: admin.php?action=post&id=' . $postId);
        }
    }


    public function addArticle($titrearticle, $article)
    {
        $postManager = new sabate\Model\PostManager();
        $affectedLines = $postManager->postArticle($titrearticle, $article);
        if ($affectedLines === true ) {
            
            header('Location: admin.php'); 
        }
        else {
            throw new Exception('Impossible d\'ajouter un article !');
        }
    }

    public function deleteArticle($id)
    {
        $postManager = new sabate\Model\PostManager();
        $affectedLines = $postManager->delete($id);
        if ($affectedLines === true ) {
            
            header('Location: admin.php'); 
        }
        else {
            throw new Exception('Impossible d\'ajouter un article !');
        }
    }

    public function updateArticle($id, $titrearticle, $article)
    {
        $postManager = new sabate\Model\PostManager();
        $affectedLines = $postManager->update($id, $titrearticle, $article);
        if ($affectedLines === true ) {
            
            header('Location: admin.php'); 
        }
        else {
            throw new Exception('Impossible de modifier l\'article !');
        }
    }

    public function listSignaled()
    {
        $CommentManager = new sabate\Model\CommentManager(); // Création d'un objet
        $signaled = $CommentManager->getSignaled(); // Appel d'une fonction de cet objet
        require('view/backend/commentView.php');
    }

    public function recupSignaled($id)
    {
        $CommentManager = new sabate\Model\CommentManager(); // Création d'un objet
        $affectedLines = $CommentManager->recupSi($id); // Appel d'une fonction de cet objet
        if ($affectedLines === true ) {
            
            header('Location: admin.php?action=listSignaled'); 
        }
        else {
            throw new Exception('Impossible de signaler le commentaire !');
        }
        require('view/backend/commentView.php');
    }

    public function deleteSignaled($id)
    {
        $commentManager = new sabate\Model\CommentManager();
        $affectedLines = $commentManager->deleteSi($id);
        if ($affectedLines === true ) {
            
            header('Location: admin.php'); 
        }
        else {
            throw new Exception('Impossible d\'ajouter un article !');
        }
    }

    public function logged()
    {
        return isset($_SESSION['login']);
    }
}


