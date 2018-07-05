<?php
namespace sabate\Model;

class CommentManager extends Manager
{
	public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $comment ->execute(array($commentId));
        
        return $comment;
    }
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
	
	public function updateComment($commentId, $comment)
	{
		$db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment = ?, comment_date = NOW() WHERE id = ?');
        $affectedLines = $comments->execute(array($comment, $commentId));

        return $affectedLines;
	}

    public function signaled($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET signalement = 1 WHERE comments.id = ?');
        $affectedLines = $comments->execute(array($id));
        return $affectedLines;
    }

    public function getSignaled()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, comment_date FROM comments WHERE signalement = 1');
        return $req;
    }

    public function deleteSi($id){

        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req = $delete->execute(array($id));
        return $req;

    }

}