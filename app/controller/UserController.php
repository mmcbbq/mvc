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
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] === "POST" && $user->validate($_POST)) {
                $_POST["password"] = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $user->create($_POST);
                echo 'In die Datenbank';
                $id = $user->getLastId();
                header("refresh:5;url='http://localhost/mvc/public/user/show/$id'");

        } else {

            $this->view('user/create',['errors'=>$user->getErrors(),'oldinput'=>$_POST,'test'=>["new","old"]]);
        }


    }

    public function edit($id)
    {
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $user->update($_POST);
            echo 'in die datenbank';
            header("refresh:5;url='http://localhost/mvc/public/user/show/$id'");
        } else {
            $user = new User();
            $user = $user->findById($id);
            $this->view('user/update', ['user' => $user]);

        }
    }

    public function delete($id)
    {
        $user = new User();
        $data = $user->findById($id);
        $user->delete($id);
        $this->view('user/delete', ['user' => $data]);
    }
}

