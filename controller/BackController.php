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

                if (!empty($erreur)) {

                    $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas publier votre chapitre';

                    $myView = new View();
                    $myView->render('addPost');

                } else {


                    $post = new Post();

                    $post->setImg($_FILES['img']['name']);
                    $post->setName($_POST['name']);
                    $post->setTitle($_POST['title']);
                    $post->setContent($_POST['content']);
                    $post->setCreatedAt(new DateTime());

                    $manager = new PostManager();
                    $manager->addPostDb($post);

                    $_SESSION['alertes']['submit_success'] = 'Super votre commentaire est en ligne';

                    $myView = new View('dashboard');
                    $myView->redirect('dashboard');

                }
            }

        }

        $myView = new View('addPost');
        $myView->render();

    }


    public function editPost()
    {            //var_dump($_FILES,$_POST,$_GET);die;

        if ((!empty($_FILES['img'])) && (!empty($_POST['name'])) && (!empty($_POST['title'])) && (!empty($_POST['content'])) && (!empty($_GET['id']))) {

            $post = new Post();
            $post->setImg($_FILES['img']['name']);
            $post->setName($_POST['name']);
            $post->setTitle($_POST['title']);
            $post->setContent($_POST['content']);
            $post->setCreatedAt(new DateTime());

            $manager = new PostManager();
            $post = $manager->updatePostDb($post);

            $myView = new View('dashboard');
            $myView->redirect('dashboard');
        }

        //(isset($_GET['id']) && ($_GET['id'] > 0 )){
        //}

        $myView = new View('editPost');
        $myView->render(compact('post'));

    }

    public function deletePost($id)
    {

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


    }

    public function deleteComment($id)
    {
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
    }

    public function validatedComment()
    {
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


    }
}
