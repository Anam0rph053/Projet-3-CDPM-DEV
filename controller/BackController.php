<?php

class Backcontroller
{
    public function dashboard($id)
    {


        if($_SESSION['user']['role'] === 'admin') {

                $postManager = new PostManager();
                $commentManager = new CommentManager();
                $posts=$postManager->getPosts();

                $warningComments = $commentManager->warningCommentDb($id);
                $myView = new View('dashboard');
                $myView->render($posts, $warningComments);


        }else{

                $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

                $myView = new View();
                $myView->redirect('home');
        }
    }

    public function editPost()
    {
        $myView = new View('editPost');
        $myView->render();

        /*if (isset($_POST['submit'])){
            $file=$_FILES['file']['name'];
            $max_size =2097152;
            $size=filesize($_FILES['file']['tmp_name']);
            $extensions = array('.png','.jpeg','.jpg','.PNG','.JPG','.JPEG');
            $extension = strrchr($file,'.');

            if(!in_array($extension, $extensions)){
                $error = $_SESSION['alertes']['submit_error'] = 'Vous devez uploader un fichier de type Png, jpg, ou jpeg';
            }
            if($size>$max_size){
                $error =  $_SESSION['alertes']['submit_error'] = 'fichier trop volumineux';

            }
            if(!isset($error)){
                move_uploaded_file($_FILES['file']['tmp_name'],"img/".$file);
            }else {
                echo $error;
            }
        }*/


    }

     public function addPost($variables)
     {


         $erreur=[];

       // if (!empty($_POST) && !empty($_FILES)) {


            // if (isset($_FILES['image']) && isset($_POST['name']) && isset($_POST['title']) && isset($_POST['created_at']) && isset($_POST['content']) && !empty($_FILES['image']) && !empty($_POST['name']) && !empty($_POST['title']) && !empty($_POST['created_at']) && !empty($_POST['content'])) {

                 if(isset($_FILES['img'])) {
                        require('/classes/imgClass.php');
                     $img = $_FILES['img'];
                     $extension = strtolower(substr($img['name'],-3));
                     $allow_ext = array("jpg",'jpeg','png');
                     if(in_array($extension, $allow_ext)){
                         move_uploaded_file($img['tmp_name'],  "assets/images/" . $img['name']);
                         Img::creerMin("assets/images/".$img['name'], "assets/images/miniatures/",$img['name'],215,112);
                     }else {

                         $erreur = "Mauvais format de fichier";
                     }


                     /* $maxsize = 1024000000;
                      // $maxwidth = 230px;
                      //  $maxheight = 500px;

                      if (isset($_FILES['image']) OR $_FILES['image']['error'] > 0) {

                          $erreur = "erreur lors du transfert";
                      }

                      if ($_FILES['image']['size'] > $maxsize) {
                          $erreur = "le fichiers est trop gros";
                      }

                      $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');

                      $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
                      if (in_array($extension_upload, $extensions_valides)) echo "Extension correcte";

                      // $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
                      // if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
                  }


                 } else {
                     $erreur['errorForm'] = 'Un élément manque pour vous inscrire';
                 }

                 if (!empty($erreur)) {

                     $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas publier votre chapitre';

                     $myView = new View('dashboard');
                     $myView->redirect('dashboard');

                 } else {

                     $manager = new PostManager();
                     $manager->addPostDb($variables);


                     $_SESSION['alertes']['submit_success'] = 'Super votre commentaire est en ligne';

                     $myView = new View('dashboard');
                     $myView->redirect('dashboard');

                 }*/
                 }
            // }
             $myView = new View('addPost');
             $myView->render();

         }

   // }


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

            $deletePost = $PostManager->deletePostDb($id);

            $myView = new View('dashboard');
            $myView->redirect('dashboard');
        }


    }

    public function updatepost()
    {
        if(isset($id)){
            $PostManager= new PostManager();
            $post = $PostManager->updatePostDb($id);
        }
        $myView = new View('editpost');
        $myView->render();
    }

    public function deleteComment($id)
    {
        $PostManager = new PostManager();
        // $affectedLines = $PostManager->deletePostDb($id);
        $affectedLines = $PostManager->getcomment($id);


        if ($affectedLines === false) {

            $_SESSION['alertes']['submit_error'] = "lecommentaire n'a pas pû être supprimé";
            //require('view/frontend/editCommentView.php'); peut se mettre dans la partie erreur

        } else {
            $deleteComment = $PostManager->deleteCommentDb($id);

            $_SESSION['alertes']['submit_success'] = "Félicitation le chapitre a bien été supprimé";

            $myView = new View();
            $myView->redirect('dashboard');
        }
    }

    public function validatedComment()
    {
        if (!empty($_GET)) {
            {
                if ($_GET['id']) {

                    $CommentManager = new CommentManager();
                    // $comment = $CommentManager->getComment($id['id']);
                    // $signal = $comment['validated'] == 1;

                    $CommentManager->validatedCommentDb($_GET['id']);

                    $_SESSION['alertes']['submit_success'] = 'Ce commentaire a été validé';

                    $myView = new View('dashboard');
                    $myView->redirect('dashboard');

                }
                else {

                    $_SESSION['alertes']['submit_error'] = 'Ce commentaire ne peut pas être validé';

                    $myView = new View('dashboard');
                    $myView->redirect('dashboard');
                }

            }
        }
    }

}
