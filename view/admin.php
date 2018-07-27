<?php if(!isset($_SESSION['role']) OR $_SESSION['role'] != 1)
{
$_SESSION['accessdenied'] = "Vous n'avez pas l'autorisation ";

header('Location: '); // La page où tu veux rediriger le membre
exit(); // Afin que la suite du code ne s'exécute pas
?>
    <H2>Administration</H2>


<?php
// Ici on est bien loggué, on affiche un message
echo 'Bienvenue ', $_SESSION['pseudo'];
?>

