<?php 
namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model {
    public string $email;
    public string $password;

    public function login() {
        $userObj = new User();
        $user = $userObj->findOne([
            "email" => $this->email
        ]);

        if (!$user) {
            return "This email doesn't exist.";
        } 

        if (!password_verify($this->password, $user->password)) {
            return "Password doesn't match.";
        }

        // var_dump($user);

        Application::$app->login($user);
        return true;
    }
}
?>