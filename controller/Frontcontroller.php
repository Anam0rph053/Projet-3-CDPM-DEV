<?php

class Frontcontroller
{
    public function showHome()
    {
        $postManager = new PostManager();
        $posts = $postManager->getLimitPosts();

        $myView = new View('home');
        $myView->render($posts);

    }

    public function showAbout()
    {
        $myView = new View('about');
        $myView->render();

    }

    public function listPosts()
    {
        $postManager = new PostManager();

        if(isset($_GET['page'])){

           $page = $_GET['page'];

           $max = $page * 3 ;

           $min = $max - 3;

            $posts = $postManager->getPostsLimitPaginate($min);

    }else {
            $posts = $postManager->getPostsLimitPaginate(0);
        }

        $nbrPosts = $postManager->count();
        $nbrePage = ceil($nbrPosts['nbre'] / 3);

        $myView = new View('list-posts');
        $myView->render(compact('posts', 'nbrePage'));

    }

    public function singlePost()
    {

        if(isset($_GET['id'])){

            $postManager = new PostManager();
            $CommentManager = new CommentManager();

            $post = $postManager->getPost();
            $comments = $CommentManager->getComments($_GET['id']);

            $myView = new View('post');
            $myView->render(compact('post', 'comments'));
        }

        }



   public function addComment()

   {
       $erreur = [];


        if (!empty($_POST)) {
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
                        $comment = htmlspecialchars($_POST['comment']);
                    } else {
                        $erreur['errorPseudo'] = ' Votre commentaire est trop long ';
                    }

                } else {
                    $erreur['errorForm'] = 'Un élément manque pour vous inscrire';
                }

                if (!empty($erreur)) {

                    $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas publier votre commentaire';

                    $myView = new View('post');
                    $myView->redirect('post&id='.$_GET['post_id']);

                } else {
                    $CommentManager = new CommentManager();
                    $CommentManager->addCommentDb();


                    $_SESSION['alertes']['submit_success'] = 'Super votre commentaire est en ligne';

                  $myView = new View('post');
                  $myView->redirect('post&id='.$_GET['post_id']);

                }
            }

            $myView = new View('post');
            $myView->render(compact('post', 'comments'));

        }
    }

    public function warningComment(){
        if (!empty($_GET)) {
            if (isset($_GET['id'])) {

                $CommentManager = new CommentManager();

                $CommentManager->warningCommentDb();

                $_SESSION['alertes']['submit_success'] = 'Ce commentaire est signalé';

                $myView = new View('post');
                $myView->redirect('post&id='.$_GET['post_id']);

            } else {

                $_SESSION['alertes']['submit_error'] = 'Ce commentaire ne peut pas être signalé';

                $myView = new View();
                $myView->redirect('post&id='.$_GET['post_id']);
            }


        }

    }
    public function showContact()
    {
        if(!empty($_POST)){

            extract ($_POST);
            $valid = true;

            if(empty($pseudo)){
                $valid = false;
                $_SESSION['alertes']['submit_error'] = "Vous n'avez pas rempli votre Pseudo";

            }
            if(empty($email)){
                $valid = false;
                $_SESSION['alertes']['submit_error'] = "Vous n'avez pas rempli votre email";
            }
            if(empty($title)){
                $valid = false;
                $_SESSION['alertes']['submit_error'] = "Vous n'avez pas rempli votre objet de message";
            }
            if(empty($message)){
                $valid = false;
                $_SESSION['alertes']['submit_error'] = "Vous n'avez pas rempli votre message";
            }
            if($valid){

                $to      = "n.coplo@gmail.com";
                $subject = $pseudo."a contacté le site";
                $header = "From : $pseudo <$email>";


                if(mail($to, $subject, $message, $header)){

                    $_SESSION['alertes']['submit_success'] = 'le message à bien été envoyé';

                    unset($pseudo);
                    unset($email);
                    unset($message);

                }
                else{
                    $_SESSION['alertes']['submit_error'] = 'Une erreur est survenue nous ne pouvons pas envoyé votre message';
                }
            }

        }

        $myView = new View('contact');
        $myView->render();


    }




}