<?php

class CommentManager extends Manager
{

    public function getComments($postId){
        $db=$this->db;

        $query = "SELECT * FROM comments WHERE post_id = ?";
        $req = $db->prepare($query);
        $req->execute([$postId]);
        $comments = $req->fetchAll();
        $comments_by_id = [];
        foreach ($comments as $comment) {
            $comments_by_id[$comment->id] = $comment;
        }
        foreach ($comments as $k =>$comment){
            if($comment->parent_id!=0){
                $comments_by_id[$comment->parent_id]->children[] =$comment;
                unset($comments[$k]);
            }
        }
        return $comments_by_id;
        }

      /*$query = "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC";
        $req = $db->prepare($query);
        $req->execute(array($postId));
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {


            //  on peut également faire un hydrate a la place de la methode ci dessous...

            $comment = new Comment();
            $comment->setId($row['id']);
           // $comment->setPostId($row['post_id']);
            //$comment->setParentId($row['parent_id']);
            $comment->setAuthor($row['author']);
            $comment->setComment($row['comment']);
          //  $comment->setCommentDate($row['comment_date']);
            $comments [] = $comment; //tableau d'obejt

            //substr($post->getContent(), 0, 150);
            /*$extract = substr($row->text, 0, 150);
            $espace = strrpos($extract, ' ');
            $espace = strrpos($extract, 0, $espace).'...';*/
     //   };
      //  return $comments;
    /*}

    public function getComment($commentId){
        $db=$this->db;
        $query = "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr, post_id FROM comments WHERE id = ?";
        $req = $db->prepare($query);
        $req->execute(array($commentId));
        $row = $req->fetch(PDO::FETCH_ASSOC);


            //  on peut également faire un hydrate a la place de la methode ci dessous...

            $comment = new Comment();

        $comment = new Comment();
        $comment->setId($row['id']);
        // $comment->setPostId($row['post_id']);
        //$comment->setParentId($row['parent_id']);
        $comment->setAuthor($row['author']);
        $comment->setComment($row['comment']);
        $comment->setCommentDate($row['comment_date']);


        return $comment;*/



}