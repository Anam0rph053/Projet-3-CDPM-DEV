<?php


class Routeur
{
    private $request;
    private $routes = [

        "home"                   =>["controller" => 'Frontcontroller', "method" => 'showHome'],
        "contact"                =>["controller" => 'Frontcontroller', "method" => 'showContact'],
        "posts"                  =>["controller" => 'Frontcontroller', "method" => 'listPosts'],
        "post"                   =>["controller" => 'Frontcontroller', "method" => 'singlePost'],
        "about"                  =>["controller" => 'Frontcontroller', "method" => 'showAbout'],
        "comment-edit-view"      =>["controller" => 'Frontcontroller', "method" => 'singlePost'],
        "add-comment"            =>["controller" => 'Frontcontroller', "method" => 'addComment'],
        "warning-comment"        =>["controller" => 'Frontcontroller', "method" => 'warningComment'],

        "login"                  =>["controller" => 'UserController',  "method" => 'userLogin'],
        "register"               =>["controller" => 'UserController',  "method" => 'newUser'],
        "profil"                 =>["controller" => 'UserController',  "method" => 'showProfil'],
        "logOut"                 =>["controller" => 'UserController',  "method" => 'userLogOut'],
        "delete-member"          =>["controller" => 'UserController',  "method" => 'deleteMember'],

        "dashboard"              =>["controller" => 'BackController',  "method" => 'dashboard'],
        "edit-post"              =>["controller" => 'BackController',  "method" => 'editPost'],
        "add-post"               =>["controller" => 'BackController',  "method" => 'addPost'],
        "delete-post"            =>["controller" => 'BackController',  "method" => 'deletePost'],
        "delete-comment"         =>["controller" => 'BackController',  "method" => 'deleteComment'],
        "validated-comment"      =>["controller" => 'BackController',  "method" => 'validatedComment'],

    ];

    public function __construct($request)
    {
        $this->request = $request;

    }

    public function getRoute()
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams()
    {
        $params = array();
        // extract GET params
        $elements = explode('/', $this->request);//request parametre initiaux en get.

        unset($elements[0]); //supprime la variable post garde id et 1

        for($i = 1; $i<count($elements); $i++)
        {
            $params[$elements[$i]] = $elements[$i+1];  //delete/id/4 => id/4
            $i++;
        }

        if(!isset($params)) $params = null ;

        // extract POST params
        if($_POST)
        {
            foreach($_POST as $key => $val)
            {
                $params[$key] = $val;
            }
        }
        return $params;

    }

    public function renderController()
    {
        $route = $this->getRoute();
        $params = $this->getParams();

        if(key_exists($route, $this->routes))
        {
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);


        } else{
            echo '404';
        }
    }

}