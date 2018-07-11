<?php
require_once("Manager.php");

class PostManager extends Manager
{

    public function getPosts()
    {
        $db=$this->db;
        $query = "SELECT * FROM posts";
        $req = $db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {


            //  on peut également faire un hydrate a la place de la methode ci dessous...

            $post = new Post();
            $post->setId($row['id']);
            $post->setName($row['name']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreatedAt($row['created_at']);

            $posts [] = $post; //tableau d'obejt

            //substr($post->getContent(), 0, 150);
            /*$extract = substr($row->text, 0, 150);
            $espace = strrpos($extract, ' ');
            $espace = strrpos($extract, 0, $espace).'...';*/
        };
        return $posts;
    }

    public function getPost($id)

    {
        $db = $this->db;


        $query = "SELECT * FROM posts WHERE id = :id";


        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);


        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);
        $post = new Post();

        $post->setId($row['id']);
        $post->setName($row['name']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setCreatedAt($row['created_at']);


         return $post;
    }
}
