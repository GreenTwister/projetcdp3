<?php
// Chargement des classes
require('model/PostManager.php');
require('model/CommentManager.php');
require('Auth/DBAuth.php');

function listPosts()
{
    $postManager = new sabate\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new sabate\Model\PostManager();
    $commentManager = new sabate\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}
function comment()
{
   
    $commentManager = new sabate\Model\CommentManager();

    $comment = $commentManager->getComment($_GET['id']);

    require('view/frontend/commentView.php');
}

function addComment($postId, $author, $comment)
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

function commentSignaled($id)
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
function Connexion($username, $password)
{
    $user = new sabate\Auth\DBAuth(); // Création d'un objet
    $connexion = $user->login($username, $password); // Appel d'une fonction de cet objet
    return $connexion;
}