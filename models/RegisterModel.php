<?php 
namespace app\models;
use app\core\Model;

class RegisterModel extends Model {
    public string $email;
    public string $userName;
    public string $name;
    public string $companyName;
    public string $jobTitle;
    public string $password;

    public string $firstName;
    public string $lastName;

    public function register() {
        echo "register check";
    }

}

?>