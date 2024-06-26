<?php
class User extends Model
{

    protected string $tablename = 'User';
    protected int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected array $errors = [];

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function getTablename(): string
    {
        return $this->tablename;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function validate(array $data): bool
    {
        if (strlen($data["name"]) < 3){
            $this->errors['name'] = "Name zu kurz";
        }
        if (strlen($data['name']) > 20){
            $this->errors['name'] = 'Name zu lang';
        }
        foreach ($data as $key=>$field){
            if (empty($field)){
                $this->errors[$key]= "$key eingeben";
        }

        }


        if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email']='Keine richtige Email';
        }
        if (empty($this->errors)){
            return true;
        }
        if ($_POST['password'] !== $_POST['checkpassword']) {
            $this->errors['checkpassword'] = 'Pws stimmen nicht ueberein';
        } else{
            unset($_POST['checkpassword']);

        }

        return false;
    }


}