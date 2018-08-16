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

                $myView = new View('home');
                $myView->redirect('home');


            }
        }

        $myView = new View('register');
        $myView->render();
    }

    public function userLogin()
    {
        if(!empty($_POST)) {

            if(isset($_POST['pseudo']) && isset($_POST['pass'])) {

                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                $UserManager = new UserManager();
                $user = $UserManager->getMembersdb();

                $isPasswordCorrect = password_verify($_POST['pass'], $user->getPass());

            }
                    if($user == null ) {

                        $_SESSION['alertes']['submit_error'] = 'Mauvais identifiant ou mauvais mot de passe';

                        $myView = new View('login');
                        $myView->redirect('login');

                            } elseif($isPasswordCorrect === true) {


                                $_SESSION['user']['id'] = $user->getId();
                                $_SESSION['user']['pseudo'] = $user->getPseudo();
                                $_SESSION['user']['email'] = $user->getEmail();
                                $_SESSION['user']['pass'] = $user->getPass();
                                $_SESSION['user']['role'] = $user->getRole();


                                if($_SESSION['user']['role'] === 'admin'){
                                    $myView = new View('dashboard');
                                    $myView->redirect('dashboard');
                                }


                                if($_SESSION['user']['role'] === 'user'){

                                    $myView = new View('profil');
                                    $myView->redirect('profil');
                                }

                        if(isset($_POST['exist'])) {

                            $_SESSION['alertes']['submit_success'] = 'Super tu est connecté';
                            setcookie('pseudo', $_POST['pseudo']);
                            setcookie('pass', $_POST['pass']);
                    }
            }


        }
        $myView = new View('login');
        $myView->render();
    }



    public function showProfil($id)
    {
        if($_SESSION['user']['role'] === 'user'){

                $UserManager = new UserManager();
                $user = $UserManager->getMemberDb($id);

                $myView = new View('profil');
                $myView->render();

        } else {

        $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

        $myView = new View();
        $myView->redirect('home');
        }

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
