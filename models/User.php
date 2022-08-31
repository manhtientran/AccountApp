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