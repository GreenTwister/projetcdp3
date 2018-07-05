<?php
namespace sabate\Model;
require('model/Manager.php');
use \PDO;
class PostManager extends Manager{

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postArticle($titrearticle, $article)
    {
        $db = $this->dbConnect();
        $articles = $db->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
        $affectedLines = $articles->execute(array($titrearticle, $article));
        return $affectedLines;
    }

    public function delete($id){

        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req = $delete->execute(array($id));
        return $req;

    }

    public function update($id, $titrearticle, $article)
    {
        $db = $this->dbConnect();
        $articles = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $affectedLines = $articles->execute(array($titrearticle, $article, $id));
        return $affectedLines;
    }
}