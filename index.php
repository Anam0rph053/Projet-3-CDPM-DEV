<?php
session_start();

include_once('_config.php');

MyAutoload::start();

if(isset($_GET['r'])){

    $request = $_GET['r'];

} else {

    $request = 'home';
}

$routeur = new Routeur($request);
$routeur->renderController();

