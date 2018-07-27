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

    public function userLogin()
    {
        if (!empty($_POST)) {
            if (isset($_POST['pseudo']) AND isset($_POST['pass'])) {

                $UserManager = new UserManager();
                $result = $UserManager->getMembersdb($_POST);
            }
            if ($result == null ) {

                $_SESSION['alertes']['submit_error'] = 'Mauvais identifiant ou mauvais mot de passe';

                $myView = new View();
                $myView->redirect('login');

            } else {

                $_SESSION['user']['id'] = $result;
                $_SESSION['user']['pseudo'] = $result;
                $_SESSION['user']['email'] = $result;
                $_SESSION['user']['pass'] = $result;
                $_SESSION['user']['role'] = $result;


                $_SESSION['alertes']['submit_success'] = 'Super tu est connecté';

                if (isset($_POST ['exist'])) {

                    setcookie('pseudo', $_POST['pseudo']);
                    setcookie('pass', $_POST['pass']);
                }

                $myView = new View();
                $myView->redirect('profil');

            }

        }
        $myView = new View('login');
        $myView->render();
    }

    public function showProfil(){
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
