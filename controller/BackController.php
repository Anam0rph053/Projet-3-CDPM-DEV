<?php

class Backcontroller
{
    public function dashboard($variables)
    {


        if($_SESSION['user']['role'] === 'admin') {

            $myView = new View('dashboard');
            $myView->render();

        }else{

                $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

                $myView = new View();
                $myView->redirect('home');
        }
    }
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        $myView = new View('dashboard');
        $myView->render($posts);

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

    public function uploadImg()
    {
        if($_FILES['image']['error'] >0) $erreur = "erreur lors du transfert";


        if($_FILES['image']['size'] > $maxsize) $erreur = "le fichiers est trop gros";


        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

        $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
        if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";

        $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
    }




}
