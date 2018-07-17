<?php

class Comment
{

    private $id;
    private $post_id;
    private $pseudo;
    private $parent_id;
    private $comment;
    private $comment_date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }


    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $author
     */
    public function setPseudo($pseudo)
    {
        $this->author = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * @param mixed $comment_date
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }


}


