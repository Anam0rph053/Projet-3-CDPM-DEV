<?php
require_once("Manager.php");

class PostManager extends Manager
{

    public function getPosts()
    {
        $db = $this->db;
        $query = "SELECT * FROM posts ORDER BY id ASC";
        $req = $db->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {


            //  on peut également faire un hydrate a la place de la methode ci dessous...

            $post = new Post();
            $post->setId($row['id']);
            $post->setImg($row['img']);
            $post->setName($row['name']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreatedAt($row['created_at']);

            $posts[] = $post; //tableau d'obejt

            //substr($post->getContent(), 0, 150);
            /*$extract = substr($row->text, 0, 150);
            $espace = strrpos($extract, ' ');
            $espace = strrpos($extract, 0, $espace).'...';*/
        };
        return $posts;
    }

    public function getLimitPosts()
    {
        $db = $this->db;
        $query = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 3 ";
        $req = $db->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {


            //  on peut également faire un hydrate a la place de la methode ci dessous...

            $post = new Post();
            $post->setId($row['id']);
            $post->setImg($row['img']);
            $post->setName($row['name']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setCreatedAt($row['created_at']);

            $posts[] = $post; //tableau d'obejt

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
        $post->setImg($row['img']);
        $post->setName($row['name']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setCreatedAt($row['created_at']);


        return $post;
    }

    public function addPostDb($post)
    {
        $db = $this->db;


            $query = "INSERT INTO posts( img, name, title, content, created_at)  
                      VALUES( :img , :name, :title, :content, NOW());";


            $req = $db->prepare($query);
        $req->bindValue(':img', $post->getImg(), PDO::PARAM_STR);
        $req->bindValue(':name', $post->getName(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);

        $req->execute();

    }

    public function updatePostDb($post)
    {

        $db = $this->db;


        $query = "UPDATE posts SET img = :img, name = :name, title = :title, content = :content WHERE id = :id";

        $req = $db->prepare($query);


        $req->bindValue(':img', $post->getImg(), PDO::PARAM_STR);
        $req->bindValue(':name', $post->getName(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);

        $req->execute();
    }

    public function deletePostDb($id)
    {
            $db = $this->db;

            $query = "DELETE FROM posts WHERE id = :id ";

            $req = $db->prepare($query);

            $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $req->execute();

    }


}
