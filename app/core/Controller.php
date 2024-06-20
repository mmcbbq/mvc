<?php

 abstract class Controller
{
    public function view(string $name, array $data =[]): void
    {
        $viewFile = '../app/view/' . $name . '.php';

        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            require '../app/view/PageNotFound.php';
        }
    }
}