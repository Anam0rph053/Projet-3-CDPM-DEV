<?php
include_once 'model/UserManager.php';

class UserController
{

    public function newUser()
    {
        $erreur = [];

        if (!empty($_POST)) {

            if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['email'])) {

                if ($_POST['pass'] == $_POST['pass2']) {
                    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                } else {
                    $erreur['errorPass'] = 'Vos mot de passe ne sont pas identiques';
                }

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
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $UserManager = new UserManager();
                $result = $UserManager->getMembersdb($_POST);
            }
            if ($result == null ) {
                $_SESSION['alertes']['submit_error'] = 'Mauvais identifiant ou mauvais mot de passe';

                $myView = new View();
                $myView->redirect('login');
            } else {

                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['alertes']['submit_success'] = 'Super bienvenue parmis nous';
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

    public function logOut(){
        if (isset($_GET['logOut']))
        {
            session_destroy();
            $myView = new View('profil');
            $myView->render();
            exit();
        }

// Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass', '');

        $_SESSION['alertes']['submit_success'] = 'Super tu est déconnecté';

        $myView = new View();
        $myView->redirect('profil');
    }
}