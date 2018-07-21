<?php

class Frontcontroller
{
    public function showHome($variables)
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
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($id['id']);
        $comments = $CommentManager->getComments($id['id']);


       // var_dump($commentsById);
       // var_dump($comments);
       // var_dump($commentsById);die;

            $myView = new View('post');
            $myView->render(compact('post', 'comments'));
            // $myView->render(array('post'=> $post));
        }



   public function addComment($values)

   {
       $erreur = [];


        if (!empty($_POST) && !empty($_GET) && isset($_GET['post_id']) && $_GET['post_id'] > 0) {
            {

                if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['comment']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['comment'])) {

                    if (strlen($_POST['pseudo']) <= 32) {
                        $pseudo = strtolower(htmlspecialchars($_POST['pseudo']));
                    } else {
                        $erreur['errorPseudo'] = ' Votre pseudo est trop long ou contient des majuscules';
                    }

                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $email = htmlspecialchars($_POST['email']);


                    } else {
                        $erreur['errorEmail'] = 'Votre email n\'est pas au bon format ou ne sont pas identiques';
                    }

                    if (strlen($_POST['comment']) <= 500) {
                        $pseudo = htmlspecialchars($_POST['comment']);
                    } else {
                        $erreur['errorPseudo'] = ' Votre commentaire est trop long ';
                    }

                } else {
                    $erreur['errorForm'] = 'Un élément manque pour vous inscrire';
                }

                if (!empty($erreur)) {

                    $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas publier votre commentaire';

                    $myView = new View('post');
                    $myView->redirect(compact('post', 'comments'));


                } else {

                    $CommentManager = new CommentManager();
                    $CommentManager->addCommentDb($values);

                    $_SESSION['alertes']['submit_success'] = 'Super votre commentaire est en ligne';

                  //  $myView = new View('post');
                   // $myView->redirect(compact('post', 'comments'));

                }
            }


            $myView = new View('post');
            $myView->render(compact('post', 'comments'));

        }
    }

/*
       if (!empty($_GET)) {

           if (isset($_GET['id']) && $_GET['id'] > 0) {
               if (!empty($_POST['pseudo']) && !empty($_POST['Email']) && !empty($_POST['comment'])) {

                   $postManager = new PostManager();
                   $CommentManager = new CommentManager();

                   $post = $postManager->getPost($id['id']);
                   $comments = $CommentManager->getComments($id['id']);


               } else {
                   $_SESSION['alertes']['submit_error'] = 'votre commentaires n\'a pas pû être posté';

               }
           } else {
               $_SESSION['alertes']['submit_error'] = 'Aucun Id de post n\a été envoyé';

           }

           $_SESSION['alertes']['submit_success'] = 'Votre cOmmentaires à bien été posté';

           $myView = new View('post');
           $myView->render(compact('post', 'comments'));
       }

   }*/

    public function showContact($variables)
    {

        $myView = new View('contact');
        $myView->render();


    }



}