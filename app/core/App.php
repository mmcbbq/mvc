<?php

class App
{
    private string $controller = "UserController";
    private string $methode = "index";

    public function show($something)
    {
        echo "<pre>";
        print_r($something);
        echo "<pre>";
    }

    private function urlExplode()
    {
        $url = explode('/', rtrim($_GET['url'], '/'));
        return $url;
    }

    private function pageNotFound(): void
    {
        $this->controller = "PageNotFoundController";
        require '../app/controller/PageNotFoundController.php';
        $controller = new $this->controller;
        call_user_func_array([$controller, "index"], ['daten']);
    }


    public function loadController()
    {
        $url = $this->urlExplode();

        $controllerFile = '../app/controller/' . ucfirst($url[0]) . 'Controller.php';

        if (file_exists($controllerFile)) {
            $this->controller = ucfirst($url[0]) . "Controller";
            $this->methode = $url[1] ?? "index";
            require $controllerFile;

            $controller = new $this->controller;

            if (!empty($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $this->methode = $url[1];
//                    todo if

                    $id = $url[2] ?? "";
                    call_user_func_array([$controller, $this->methode], [$id]);
                } else {

                    $this->pageNotFound();
                }
            }else{
                call_user_func_array([$controller, $this->methode], []);
            }
        } else {
            $this->pageNotFound();
        }
    }
}