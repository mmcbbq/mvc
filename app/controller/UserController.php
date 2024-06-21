<?php

class UserController extends Controller
{
    public function index(string $data)
    {
        //todo model
        $this->view("user/index");

    }

    public function create():void
    {
        $this->view("user/create");
    }


}

