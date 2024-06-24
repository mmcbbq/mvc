<?php

class UserController extends Controller
{
    public function index(string $data = '')
    {

        $user = new User();
        $result = $user->findAll();
        $this->view("user/index", ["users" => $result]);

    }

    public function show(int $id)
    {
        $user = new User();
        $result = $user->findById($id);
        if ($result) {
            $this->view('user/show', ['user' => $result]);
        } else {
            $this->view("user/notFound", ["id" => $id]);
        }

    }


    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($_POST['password'] === $_POST['checkpassword']){
                $user = new User();
                unset($_POST['checkpassword']);
                $_POST["password"] = password_hash($_POST['password'],PASSWORD_BCRYPT);
                $user->create($_POST);
                echo 'In die Datenbank';
                $id = $user->getLastId();
                header("refresh:5;url='http://localhost/mvc/public/user/show/$id'");
            }else{
                echo 'pw fehler';
            }


        } else {

            $this->view('user/create');
        }


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
        $this->view('user/delete', ['user' => $data]);
    }


}

