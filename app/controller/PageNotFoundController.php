

<?php

class PageNotFoundController extends Controller
{

    public function index(string $data):void
    {
        //todo model
        $this->view("PageNotFound.php");

    }
}