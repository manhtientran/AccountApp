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
            return false;
        } 

        if (!password_verify($this->password, $user->password)) {
            return false;
        }

        // var_dump($user);

        return Application::$app->login($user);
    }
}
?>