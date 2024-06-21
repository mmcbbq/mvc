<?php

class UserController extends Controller
{
    public function index(string $data)
    {

        $user = new User();
        $result = $user->findAll();
        print_r($result);
        $this->view("user/index");

    }

    public function create():void
    {
        $this->view("user/create");
    }


}

