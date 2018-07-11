<?php
include_once 'model/UserManager.php';

class UserController
{

    public function newUser()
    {
        $erreur = [];

        if(!empty($_POST)){

            if(isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['email'])) {

                if ($_POST['pass'] == $_POST['pass2']) {
                    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                }
                else {
                    $erreur['errorPass'] = 'Vos mot de passe ne sont pas identiques';
                }

                if (strlen($_POST['pseudo']) <= 32) {
                    $pseudo = strtolower(htmlspecialchars($_POST['pseudo']));
                } else {
                    $erreur['errorPseudo'] =' Votre pseudo est trop long ou contient des majuscules' ;
                }

                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $email = htmlspecialchars($_POST['email']);
                }
                else {
                    $erreur['errorEmail'] = 'Votre email n\'est pas au bon format ou ne sont pas identiques';
                }
            }
            else {
                $erreur['errorForm'] = 'Un élément manque pour vous inscrire';
            }
                if(!empty($erreur)){

                    $_SESSION['alertes']['submit_error'] = 'problème on ne peut pas vous enregistrer';

                    $myView = new View();
                   $myView->redirect('register');


                }else{

                    $userManager = new UserManager();
                    $userManager->addMembersdb($_POST);

                    $_SESSION['alertes']['submit_success'] = 'Super bienvenue parmis nous';

                    $myView= new View('home');
                    $myView->render();


                }
            }

        $myView= new View('register');
        $myView->render();
    }

   public function login($values)
   {
       if (!empty($_POST)) {

           $pseudo = htmlspecialchars($_POST['pseudo']);

           $userManager = new UserManager();
           $result = $userManager->getMembersdb($values);


           if ($result == null) {
               $_SESSION['alertes']['submit_error'] = 'Mauvais identifiant ou mauvais mot de passe';
               $myView = new View('login');
               $myView->render();

           } //Sinon, on enregistre l'utilisateur en session et on ajouter les cookies, et on redirige
           else {
               $_SESSION['id'] = $result['id'];
               $_SESSION['pseudo'] = $pseudo;


               if (isset($_POST ['exist'])) {
                   setcookie('login', $pseudo);
                   setcookie('pass', $pass);
               }
               $myView = new View('login');
               $myView->render();
           }

       }
   }
}
