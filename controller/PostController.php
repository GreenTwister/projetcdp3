<?php
// Chargement des classes
require('model/PostManager.php');
require('model/CommentManager.php');
require('Auth/DBAuth.php');

function listPosts()
{
    $postManager = new sabate\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/backend/listPostsView.php');
}

function post()
{
    $postManager = new sabate\Model\PostManager();
    $commentManager = new sabate\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/backend/postView.php');
}
function comment()
{
   
    $commentManager = new sabate\Model\CommentManager();

    $comment = $commentManager->getComment($_GET['id']);

    require('view/backend/commentView.php');
}

function addComment($postId, $author, $comment)
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

function modifyComment($commentId, $comment)
{
    
    $commentManager = new sabate\Model\CommentManager();
    $affectedLines = $commentManager->updateComment($commentId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: admin.php?action=comment&id=' . $commentId);
    }
}

function addArticle($titrearticle, $article)
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

function deleteArticle($id)
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

function updateArticle($id, $titrearticle, $article)
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
function listSignaled()
{
    $CommentManager = new sabate\Model\CommentManager(); // Création d'un objet
    $signaled = $CommentManager->getSignaled(); // Appel d'une fonction de cet objet
    require('view/backend/commentView.php');
}

function deleteSignaled($id)
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

function Connexion($username, $password)
{
    $user = new sabate\Auth\DBAuth(); // Création d'un objet
    $connexion = $user->login($username, $password); 
    return $connexion;
}
function logged()
{
    $user = new sabate\Auth\DBAuth(); // Création d'un objet
    $logged = $user->logged(); // Appel d'une fonction de cet objet
    return $logged;
}

