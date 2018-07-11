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
        $post = $postManager->getPost($id['id']);

        $myView = new View('post');
        $myView->render(array('post'=>$post));

    }

    public function showContact($params)
    {

        $myView = new View('contact');
        $myView->render();


    }
    function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);


        $_SESSION['alertes']['submit_success'] = 'commentaire posté';
        $_SESSION['alertes']['submit_error'] = 'le commentaire n\a pas pû être posté';
        header('Location: index.php?action=post&id=' . $postId);


    }
    function showEditComment($commentId)
    {
        $commentManager = CommentManager();
        $comment = $commentManager->getComment($commentId); // methode qui va chercher un com a modifier.
        require('view/frontend/editCommentView.php');

    }
    function editComment($commentId,$postId,$author,$comment)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->editCommentdb($commentId,$author,$comment);


        $_SESSION['alertes']['submit_success'] = 'commentaire modifié';
        $_SESSION['alertes']['submit_error'] = 'le commentaire n\a pas pû être modifié';


        header('Location: index.php?action=post&id=' . $postId);

        /*if (!empty($submit)){
            echo $submit;
        } else {
            $submit='';
            header('Location: index.php?action=post&id=' . $postId);
        }*/
    }
    function deleteComment($commentId, $postId)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->deleteComment($commentId);

        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer le commentaire !');
            //require('view/frontend/editCommentView.php'); peut se mettre dans la partie erreur
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

}