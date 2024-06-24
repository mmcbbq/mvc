<?php

 abstract class Controller
{
    public function view(string $name, array $data =[]): void
    {

        $loader = new \Twig\Loader\FilesystemLoader('../app/view');
        $twig = new \Twig\Environment($loader);





        $viewFile = '../app/view/' . $name . '.html.twig';

        if (file_exists($viewFile)) {

            echo $twig->render("$name.html.twig",$data);


//            require $viewFile;
        } else {
            require '../app/view/PageNotFound.php';
        }
    }
}