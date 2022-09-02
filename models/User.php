<?php 
namespace app\models;

use app\core\Application;
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
    public string $avatarName = "";

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

    public function updateOne($where) {
        // $where is associative array
        $id_user = Application::$app->user->id;

        if (array_key_exists("name", $where)) {
            $namePiece = explode(" ", $where["name"]);
            Application::$app->user->firstName = $namePiece[sizeof($namePiece) - 1];
            Application::$app->user->lastName = implode(" ", array_slice($namePiece, 0, sizeof($namePiece) - 1));
            $where["firstName"] = Application::$app->user->firstName;
            $where["lastName"] = Application::$app->user->lastName;

        }

        if (array_key_exists("avatarName", $where)) {
            Application::$app->user->avatarName = $where["avatarName"];
        }
        
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode(", ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("UPDATE $tableName SET $sql WHERE id=$id_user");
        foreach($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);

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
        return ["email", "userName", "name", "firstName", "lastName", "companyName", "jobTitle", "password", "avatarName"];
    }
    

}

?>