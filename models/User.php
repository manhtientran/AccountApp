<?php 
namespace app\models;

use app\core\DbModel;
use app\core\Model;

class User extends DbModel {
    public string $email;
    public string $userName;
    public string $name;
    public string $companyName;
    public string $jobTitle;
    public string $password;

    public string $firstName;
    public string $lastName;

    public function save() {
        $namePiece = explode(" ", $this->name);
        $this->firstName = $namePiece[sizeof($namePiece) - 1];
        $this->lastName = implode(" ", array_slice($namePiece, 0, sizeof($namePiece) - 1));
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        // Check UNIQUE for email and username
        $userObj = new User();
        if ($userObj->findOne(["email" => $this->email])) {
            return "This email is already existed";
        }

        if ($userObj->findOne(["userName" => $this->userName])) {
            return "This username is already existed";
        }

        return parent::save();
    }

    public function tableName(): string
    {
        return "users";
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function attributes(): array
    {
        return ["email", "userName", "name", "firstName", "lastName", "companyName", "jobTitle", "password"];
    }
    

}

?>