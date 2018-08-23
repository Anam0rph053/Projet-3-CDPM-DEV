<?php

class CommentManager extends Manager
{

       public function getComments($postId)
    {

        $db = $this->db;
        $query = "SELECT * FROM comments WHERE post_id = :post_id ORDER BY comment_date DESC  ";
        $req = $db->prepare($query);
        $req->bindValue(':post_id', $postId);
        $req->execute();

        $comments = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setPostId($row['post_id']);
            $comment->setPseudo($row['pseudo']);
            $comment->setComment($row['comment']);
            $comment->setCommentDate($row['comment_date']);
            $comment->setValidated($row['validated']);


            $comments[] = $comment;
        }
        return $comments;


    }

    public function getAllComments()
    {

        $db = $this->db;
        $query = "SELECT * FROM comments  ORDER BY id DESC  ";
        $req = $db->prepare($query);
        $req->execute();

        $comments = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setPostId($row['post_id']);
            $comment->setPseudo($row['pseudo']);
            $comment->setComment($row['comment']);
            $comment->setCommentDate($row['comment_date']);
            $comment->setValidated($row['validated']);


            $comments[] = $comment;
        }
        return $comments;


    }

    public function getComment($id)
    {
        $db = $this->db;
        $query = "SELECT * FROM comments WHERE id = ? ORDER BY comment_date DESC ";
        $req = $db->prepare($query);

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);
        {
            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setPostId($row['post_id']);
            $comment->setPseudo($row['pseudo']);
            $comment->setComment($row['comment']);
            $comment->setCommentDate($row['comment_date']);
            $comment->setValidated($row['validated']);

        }

        return $comment;

    }

    function addCommentDb()
    {
        $db = $this->db;

        if (!empty($_POST) && !empty($_GET['post_id']) && $_GET['post_id'] > 0) {

            $query = "INSERT INTO comments( post_id, pseudo, email, comment, comment_date)  
                      VALUES( :post_id, :pseudo,:email,:comment, NOW())";

        $req = $db->prepare($query);

        }

        $req->bindParam(':post_id', $_GET['post_id'], PDO::PARAM_INT);
        $req->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $req->bindParam(':email', $_POST['email'],PDO::PARAM_STR);
        $req->bindParam(':comment', $_POST['comment'],PDO::PARAM_STR);


        $req->execute();

    }
    function warningCommentDb()
    {
        $db = $this->db;


            $query = "UPDATE comments SET validated = 0 WHERE id = :id AND post_id = :post_id";

        $req =$db->prepare($query);

        $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $req->bindParam(':post_id', $_GET['post_id'], PDO::PARAM_INT);
        $req->execute();

    }
    function deleteCommentDb()
    {
        $db = $this->db;

        $query = "DELETE FROM comments WHERE id = :id ";

        $req = $db->prepare($query);

        $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        $req->execute();
    }


    function validatedCommentDb()
    {

        $db = $this->db;


        $query = "UPDATE comments SET validated = 1 WHERE id = :id ";

        $req =$db->prepare($query);

        $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $req->execute();
    }


}

