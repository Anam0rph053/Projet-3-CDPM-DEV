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


    public function renderController()
    {
        $route = $this->getRoute();

        if(key_exists($route, $this->routes))
        {
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method();


        } else{
            echo '404';
        }
    }

}