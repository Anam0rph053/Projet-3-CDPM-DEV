<?php
include_once 'model/UserManager.php';

class UserController
{

    public function newUser($values)
    {
        $erreur = [];

        if (!empty($_POST)) {

            if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['email'])) {

                if ($_POST['pass'] == $_POST['pass2']) {
                    $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $_POST['pass2'] = password_hash($_POST['pass2'], PASSWORD_DEFAULT);

                } else {
                    $erreur['errorPass'] = 'Vos mot de passe ne sont pas identiques';
                }

                if (strlen($_POST['pseudo']) <= 32) {
                } else {
                    $erreur['errorPseudo'] = ' Votre pseudo est trop long ou contient des majuscules';
                }

                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                } else {
                    $erreur['errorEmail'] = 'Votre email n\'est pas au bon format ou ne sont pas identiques';
                }
            } else {
                $erreur['errorForm'] = 'Un élément manque pour vous inscrire';
            }
            if (!empty($erreur)) {

                $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas vous enregistrer';

                $myView = new View();
                $myView->redirect('register');


            } else {

                $userManager = new UserManager();
                $userManager->addMembersdb($_POST);



                $_SESSION['alertes']['submit_success'] = 'Super bienvenue parmis nous';

                $myView = new View('profil');
                $myView->render();


            }
        }

        $myView = new View('register');
        $myView->render();
    }

    public function userLogin($values)
    {

        if (!empty($_POST)) {
            if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_SESSION['role'])) {

                $UserManager = new UserManager();
                $user = $UserManager->getMembersdb($values);
            }
            if($user == null ) {

                $_SESSION['alertes']['submit_error'] = 'Mauvais identifiant ou mauvais mot de passe';

                $myView = new View();
                $myView->redirect('login');

            } else {

                $_SESSION['user']['id'] = $user;
                $_SESSION['user']['pseudo'] = $user;
                $_SESSION['user']['email'] = $user;
                $_SESSION['user']['pass'] = $user;
                $_SESSION['user']['role'] = $user;

                if($_SESSION['role'] === 'admin'){

                    $myView = new View('dashboard');
                    $myView->redirect('dashboard');
                }
                if($_SESSION['role'] ==='user'){
                    $myView = new View('profil');
                    $myView->redirect('profil');
                }



            } if (isset($_POST ['exist'])) {

                $_SESSION['alertes']['submit_success'] = 'Super tu est connecté';
                setcookie('pseudo', $_POST['pseudo']);
                setcookie('pass', $_POST['pass']);
            }


        }
        $myView = new View('login');
        $myView->render();
    }



    public function showProfil()
    {

        $myView = new View('profil');
        $myView->render();
    }

    public function userLogOut(){

        session_start();
        // Réinitialisation du tableau de session
        // On le vide intégralement
        $_SESSION = array();
        // Destruction de la session
        session_destroy();
        // Destruction du tableau de session

        unset($_SESSION['user']);

        $_SESSION['alertes']['submit_success'] = 'Super tu est déconnecté';

        $myView = new View();
        $myView->redirect('home');
    }
}
