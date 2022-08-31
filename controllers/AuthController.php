<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class AuthController extends Controller {
    public function register() {
        // $params = [
        //     "name" => "Manh"
        // ];
        // return Application::$app->router->renderView("register", $params);
        return $this->render("register");
    }
}
?>