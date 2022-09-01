<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller {
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(["profile"]));
    }


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
                exit;
            }


            return $this->render("register", [
                "model" => $user
            ]);
        }
        
        return $this->render("register");
    }

    public function login(Request $request, Response $response) {
        $loginForm = new LoginForm();
        if ($request->isPost()){
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect("/profile");
                return;
            }

        }
        return $this->render("login");
    }

    public function logout(Request $request, Response $response) {
        Application::$app->logout();
        $response->redirect("/");
    }

    public function profile() {
        return $this->render("profile");
    }
}
?>