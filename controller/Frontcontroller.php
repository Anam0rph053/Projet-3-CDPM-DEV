<?php

class Frontcontroller
{
    public function showHome($params)
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        $myView = new View('home');
        $myView->render($posts);


        // include(VIEW.'home.php');

    }

    public function showAbout()
    {
        $myView = new View('about');
        $myView->render(array());

    }

    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        $myView = new View('listPosts');
        $myView->render($posts);

    }

    public function singlePost($id)

    {
        $postManager= new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($id['id']);
        $comments = $CommentManager->getComments($id['id']);

        $myView = new View('post');
        $myView->render(compact('post','comment'));
       // $myView->render(array('post'=> $post));
    }

    public function showContact($params)
    {

        $myView = new View('contact');
        $myView->render();


    }



}