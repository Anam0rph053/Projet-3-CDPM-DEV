<?php

class CommentManager extends Manager
{

    public function getComments($postId)
    {

        $db = $this->db;
        $query = "SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC  ";
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
        $query = "SELECT id, pseudo, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss')AS comment_date_fr, post_id FROM comments WHERE id = ? ORDER BY comment_date DESC ";
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
    function warningCommentDb($id)
    {
        $req = $this -> db->prepare("UPDATE Comments
                            SET validated = '0'
                            WHERE :id = `id`");
        $req->bindValue(':id',$id);
        $req->execute();
    }

}

