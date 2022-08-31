<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller {
    public function register(Request $request) {
        // $params = [
        //     "name" => "Manh"
        // ];
        // return Application::$app->router->renderView("register", $params);
        
        $registerModel = new RegisterModel();

        if ($request->isPost()) {
            // $body = $request->getBody();
            // var_dump($body);
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return "success";
            }


            return $this->render("register", [
                "model" => $registerModel
            ]);
        }
        
        return $this->render("register");
    }

    public function login() {
        return $this->render("login");
    }
}
?>