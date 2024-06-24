<?php

class UserController extends Controller
{
    public function index(string $data = '')
    {

        $user = new User();
        $result = $user->findAll();
        $this->view("user/index",["users"=>$result]);

    }

    public function show(int $id)
    {
        $user =  new User();
        $result = $user->findById($id);
        if ($result){
            $this->view('user/show',['user'=>$result]);
        }else{
            $this->view("user/notFound",["id"=>$id]);
        }

    }



    public function create():void
    {
        $user = new User();
        $user->create(["name"=>"Bob","email"=>"Bob@bob.de","password"=>"geheim"]);
        $this->view("user/create");
    }

    public function edit($id)
    {
        echo 'edit';

    }

    public function delete($id)
    {
        $user = new User();
        $data = $user->findById($id);
        $user->delete($id);
        $this->view('user/delete',['user'=>$data]);
    }


}

