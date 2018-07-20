<?php

class CommentManager extends Manager
{

    public function getComments($postId)
    {

        $db = $this->db;
        $query = "SELECT * FROM comments WHERE post_id = ?";
        $req = $db->prepare($query);
        $req->execute([$postId]);

        $comments = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {


            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setPostId($row['post_id']);
            $comment->setPseudo($row['pseudo']);
            $comment->setComment($row['comment']);
            $comment->setCommentDate($row['comment_date']);


            $comments[] = $comment;
        }
        return $comments;


    }

    public function getComment($id)
    {
        $db = $this->db;
        $query = "SELECT id, pseudo, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr, post_id FROM comments WHERE id = ?";
        $req = $db->prepare($query);
        $req->execute(array($id));
        $row = $req->fetch(PDO::FETCH_ASSOC);
        {
            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setPostId($row['post_id']);
            $comment->setPseudo($row['pseudo']);
            $comment->setComment($row['comment']);
            $comment->setCommentDate($row['comment_date']);
        }

        return $comment;

    }

    function addCommentDb($values)
    {
        $db = $this->db;
        if (!isset($values['id']) && !isset($values['post_id']) ) {
            $query = "INSERT INTO comments( pseudo, email, comment,comment_date) VALUES(  :pseudo, :email, :comment, NOW())";

        }
        $req = $db->prepare($query);
        if (isset($values['id'])&& isset($values['post_id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);
        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);
        $req->bindValue(':comment', $values['comment'], PDO::PARAM_STR);


        $req->execute();

    }

}
/*$req->bindValue(':post_id', $comment->getPostId());
$req->bindValue(':pseudo', $comment->getPseudo());
$req->bindValue(':email', $comment->getEmail());
$req->bindValue(':comment', $comment->getComment());*/
