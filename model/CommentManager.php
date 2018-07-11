<?php

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db=$this->db;
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db=$this->db;
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }


    public function getComment($commentId)
    {
        $db=$this->db;
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }


    public function editCommentdb($commentId, $author, $comment)
    {

        $db=$this->db;
        $req = $db->prepare('UPDATE comments SET author= :author, comment= :comment  WHERE id= :id');
        $req->bindParam(':comment', $comment);
        $req->bindParam(':author', $author);
        $req->bindParam(':id', $commentId);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    public function deleteComment ($commentId)
    {
        $db=$this->db;
        $req = $db->prepare('DELETE FROM comments WHERE id= :id');
        $req->bindParam(':id', $commentId);
        $req->execute();

        //return $affectedLines;
    }
}