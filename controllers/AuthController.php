<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller {
    public function register(Request $request) {
        // $params = [
        //     "name" => "Manh"
        // ];
        // return Application::$app->router->renderView("register", $params);
        
        $user = new User();

        if ($request->isPost()) {
            // $body = $request->getBody();
            // var_dump($body);
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                // return "success";
                Application::$app->response->redirect("/");
            }


            return $this->render("register", [
                "model" => $user
            ]);
        }
        
        return $this->render("register");
    }

    public function login() {
        return $this->render("login");
    }
}
?>