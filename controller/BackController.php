<?php

class Backcontroller
{
    public function dashboard()
    {


        if ($_SESSION['user']['role'] === 'admin') {

            $postManager = new PostManager();
            $commentManager = new CommentManager();

            $posts = $postManager->getPosts();
            $comments = $commentManager->getAllComments();

            $myView = new View('dashboard');
            $myView->render(compact('posts', 'comments'));


        } else {

            $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

            $myView = new View();
            $myView->redirect('home');
        }
    }


    public function addPost()
    {
        if ($_SESSION['user']['role'] === 'admin') {


        $erreur = [];

        if (!empty($_POST) && !empty($_FILES)) {


            if (isset($_FILES['img'])) {
                $name_img = basename($_FILES['img']['name']);
                $img = $_FILES['img'];
                $extension = strtolower(substr($img['name'], -3));
                $allow_ext = array("jpg", 'jpeg', 'png');
                if (in_array($extension, $allow_ext)) {
                    $chemin = "assets/images/" . $img['name'];
                    move_uploaded_file($img['tmp_name'], $chemin);

                } else {

                    $erreur = "Mauvais format de fichier";
                }

            } else {
                $erreur['errorForm'] = 'Un élément manque pour publier';

            }

            if (isset($_FILES['img']) && isset($_POST['name']) && isset($_POST['title']) && isset($_POST['content']) && !empty($_FILES['img']) && !empty($_POST['name']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                    $post = new Post();

                    $post->setImg($_FILES['img']['name']);
                    $post->setName($_POST['name']);
                    $post->setTitle($_POST['title']);
                    $post->setContent($_POST['content']);
                    $post->setCreatedAt(new DateTime());

                        if (!empty($erreur)) {

                            $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas publier votre chapitre';

                            $myView = new View();
                            $myView->render('add-post');

                } else {

                    $manager = new PostManager();
                    $manager->addPostDb($post);

                    $_SESSION['alertes']['submit_success'] = 'Super votre chapitre est en ligne';

                    $myView = new View('dashboard');
                    $myView->redirect('dashboard');

                }
            }

        }

        $myView = new View('add-post');
        $myView->render();

        } else {

            $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

            $myView = new View();
            $myView->redirect('home');
        }
    }


    public function editPost($post)

    {

       if ($_SESSION['user']['role'] === 'admin') {


           $erreur = [];

           if (!empty($_POST)) {

               if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {

                   $name_img = basename($_FILES['img']['name']);
                   $img = $_FILES['img'];
                   $extension = strtolower(substr($img['name'], -3));
                   $allow_ext = array("jpg", 'jpeg', 'png');
                   if (in_array($extension, $allow_ext)) {
                       $chemin = "assets/images/" . $img['name'];
                       move_uploaded_file($img['tmp_name'], $chemin);

                   } else {

                       $erreur = "Mauvais format de fichier";
                   }

               } else {
                   $erreur['errorForm'] = 'Un élément manque pour publier';

               }

               if (isset($_POST['name']) && isset($_POST['title']) && isset($_POST['content']) && !empty($_POST['name']) && !empty($_POST['title']) && !empty($_POST['content'])) {


                  if (!empty($erreur)) {

                       $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas publier votre chapitre';

                       $myView = new View();
                       $myView->render('editPost');

                   } else {
                   $post = new Post();

                   $post->setId($_GET['id']);

                   if (isset($_FILES['img'])){
                       $post->setImg($_FILES['img']['name']);


                   }else {
                       $post->setImg($_POST['img']);
                   }

                   $post->setName($_POST['name']);
                   $post->setTitle($_POST['title']);
                   $post->setContent($_POST['content']);
                   $post->setCreatedAt(new DateTime());

                   $manager = new PostManager();
                   $manager->updatePostDb($post);

                   $_SESSION['alertes']['submit_success'] = 'Super votre chapitre est en ligne';

                   $myView = new View('dashboard');
                   $myView->redirect('dashboard');
               }
               }
           } else {

               $PostManager = new PostManager();
               $post = $PostManager->getPost($_GET['id']);

               $myView = new View('edit-post');
               $myView->render(compact('post'));
           }


       } else {

        $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

        $myView = new View();
        $myView->redirect('home');
    }


    }



    public function deletePost($id)
    {
        if ($_SESSION['user']['role'] === 'admin') {

        $PostManager = new PostManager();
        $affectedLines = $PostManager->deletePostDb($id);

        //$affectedLines = $PostManager->getPost($id);


        if ($affectedLines === false) {

            $_SESSION['alertes']['submit_error'] = "le chapitre n'a pas pû être supprimé";

            $myView = new View('dashboard');
            $myView->redirect('dashboard/id/' . $_GET['id']);

        } else {


            $_SESSION['alertes']['submit_success'] = "Félicitation le chapitre a bien été supprimé";


            $myView = new View('dashboard');
            $myView->redirect('dashboard');
        }
            } else {

        $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

        $myView = new View();
        $myView->redirect('home');
        }


    }

    public function deleteComment($id)
    {
        if ($_SESSION['user']['role'] === 'admin') {
        $CommentManager = new CommentManager();
        $affectedLines = $CommentManager->deleteCommentDb($id);

        if ($affectedLines === false) {

            $_SESSION['alertes']['submit_error'] = "le commentaire n'a pas pû être supprimé";

            $myView = new View('dashboard');
            $myView->redirect('dashboard/id/' . $_GET['id']);


        } else {

            $_SESSION['alertes']['submit_success'] = "Félicitation le commentaire a bien été supprimé";


            $myView = new View('dashboard');
            $myView->redirect('dashboard');
        }
        } else {

            $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

            $myView = new View();
            $myView->redirect('home');
        }
    }

    public function validatedComment()
    {
        if ($_SESSION['user']['role'] === 'admin') {
        if (!empty($_GET)) {
            {
                if ($_GET['id']) {

                    $CommentManager = new CommentManager();

                    $CommentManager->validatedCommentDb($_GET['id']);

                    $_SESSION['alertes']['submit_success'] = 'Ce commentaire est validé';

                    $myView = new View('dashboard');
                    $myView->redirect('dashboard/id/' . $_GET['id']);

                } else {

                    $_SESSION['alertes']['submit_error'] = 'Ce commentaire ne peut pas être validé';

                    $myView = new View('dashboard');
                    $myView->redirect('dashboard');
                }

            }
        }

        } else {

            $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

            $myView = new View();
            $myView->redirect('home');
        }
    }
}
