<?php
/*** configuration *****/


ini_set('display_errors','on');
error_reporting(E_ALL);


class MyAutoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];


        define('HOST', 'http://'.$host.'/Projet-3-CDPM-DEV/');
        define('ROOT', $root.'/Projet-3-CDPM-DEV/');
        define('CONTROLLER', ROOT.'controller/');
        define('VIEW', ROOT.'view/');
        define('MODEL', ROOT.'model/');
        define('CLASSES', ROOT.'classes/');
        define('ASSETS', HOST.'assets/');

    }

    public static function autoload($class)
    {
        if(file_exists(MODEL.$class.'.php'))
        {
            include_once (MODEL.$class.'.php');

        } elseif (file_exists(CLASSES.$class.'.php'))
        {
            include_once (CLASSES.$class.'.php');

        }elseif (file_exists(CONTROLLER.$class.'.php'))
        {
            include_once (CONTROLLER.$class.'.php');

        };
    }


}


