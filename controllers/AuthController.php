<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class AuthController extends Controller {
    public function register(Request $request) {
        // $params = [
        //     "name" => "Manh"
        // ];
        // return Application::$app->router->renderView("register", $params);
        
        // $body = $request->getBody();
        // var_dump($body);

        if ($request->isPost()) {
            return "handle submit data";
        }
        
        return $this->render("register");
    }

    public function login() {
        return $this->render("login");
    }
}
?>