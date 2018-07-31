<?php

class Backcontroller
{
    public function dashboard()
    {

        if(isset($_SESSION['role']) === 'admin'){

            $myView = new View();
            $myView->render('dashboard');



        }else{

                $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

                $myView = new View();
                $myView->redirect('home');
                exit(); // Afin que la suite du code ne s'exécute pas
        }
    }

    public function editImg()
    {
        if (isset($_POST['submit'])){
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
        }

    }




}
