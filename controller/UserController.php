<?php
include_once 'model/UserManager.php';

class UserController
{

    public function newUser()
    {
        $erreur = [];


        if(isset($_POST) && !empty($_POST)) {
            //traitement recaptcha


            // Ma clé privée
            $secret = "6Ld9MGsUAAAAAHBuwy48P7feK736syVc-hHy25Mw";
            // Paramètre renvoyé par le recaptcha
            $response = $_POST['g-recaptcha-response'];
            // On récupère l'IP de l'utilisateur
            $remoteip = $_SERVER['REMOTE_ADDR'];

            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
                . $secret
                . "&response=" . $response
                . "&remoteip=" . $remoteip ;

            $decode = json_decode(file_get_contents($api_url), true);

            if ($decode['success'] !== true) {

                $_SESSION['alertes']['submit_error'] = 'Veuillez cocher la case captcha';

                $myView = new View('register');
                $myView->redirect('register');

            }
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

                $user = new Membres();
                $user->setPseudo($_POST['pseudo']);
                $user->setPass($_POST['pass']);
                $user->setEmail($_POST['email']);
                $user->setDateInscription(new DateTime());


                $userManager = new UserManager();
                $userManager->addMembersdb($user);


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

            //traitement recaptcha
                    // Ma clé privée
                $secret = "6Ld9MGsUAAAAAHBuwy48P7feK736syVc-hHy25Mw";
                // Paramètre renvoyé par le recaptcha
                $response = $_POST['g-recaptcha-response'];
                // On récupère l'IP de l'utilisateur
                $remoteip = $_SERVER['REMOTE_ADDR'];

                $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
                    . $secret
                    . "&response=" . $response
                    . "&remoteip=" . $remoteip ;

                $decode = json_decode(file_get_contents($api_url), true);

                if ($decode['success'] !== true) {

                    $_SESSION['alertes']['submit_error'] = 'Veuillez cocher la case captcha';

                    $myView = new View('login');
                    $myView->redirect('login');

                }

            if(isset($_POST['pseudo']) && isset($_POST['pass'])) {

                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                $UserManager = new UserManager();
                $user = $UserManager->getMembersdb();

                $isPasswordCorrect = password_verify($_POST['pass'], $user->getPass());

            }
                    if($user->getId() === null ) {

                        $_SESSION['alertes']['submit_error'] = 'Les champs pseudo et mot de passe sont obligatoires';

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



    public function showProfil()
    {

        if($_SESSION['user']['role'] === 'user'){

                    $UserManager = new UserManager();
                    $profil=  $UserManager->getMemberProfil($_SESSION['user']['pseudo']);

                    $myView = new View('profil');
                    $myView->render(compact('profil'));

        } else {

        $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

        $myView = new View();
        $myView->redirect('home');
        }

    }

    public function deleteMember()
    {

        if ($_SESSION['user']['role'] === 'user') {

            if ($_GET['id']) {

                $UserManager = new UserManager();
                $affectedLines = $UserManager->deleteMemberDb();


                if ($affectedLines === false) {

                    $_SESSION['alertes']['submit_error'] = "le compte n'a pas pû être supprimé";

                    $myView = new View('profil');
                    $myView->redirect('profil');

                } else {
                    //session_start();
                    // Réinitialisation du tableau de session
                    // On le vide intégralement
                    $_SESSION = array();
                    // Destruction de la session
                    session_destroy();
                    // Destruction du tableau de session

                    unset($_SESSION['user']);

                    $_SESSION['alertes']['submit_success'] = "Félicitation le compte a bien été supprimé";


                    $myView = new View('home');
                    $myView->redirect('home');
                }
            }
        } else {

            $_SESSION['alertes']['submit_error'] = "Vous n'avez pas l'autorisation ";

            $myView = new View();
            $myView->redirect('home');
        }
    }

    public function userLogOut(){


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
