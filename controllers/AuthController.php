<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(["profile"]));
        $this->registerMiddleware(new AuthMiddleware(["uploadImage"]));
    }


    public function register(Request $request)
    {
        // $params = [
        //     "name" => "Manh"
        // ];
        // return Application::$app->router->renderView("register", $params);

        $user = new User();

        if ($request->isPost()) {
            // $body = $request->getBody();
            // var_dump($body);
            $user->loadData($request->getBody());

            if ($user->validate()) {
                // return "success";
                // Application::$app->response->redirect("/");

                $res = $user->save();
                if ($res === true) {

                    return $this->render("register", [
                        "code" => 201,
                        "message" => "Create account successfully."
                    ]);
                } else {
                    return $this->render("register", [
                        "code" => 400,
                        "message" => $res
                    ]);
                }
            }



            return $this->render("register", [
                "model" => $user
            ]);
        }

        return $this->render("register");
    }

    public function login(Request $request, Response $response)
    {
        if (Application::$app->user !== null) {
            Application::$app->response->redirect("/profile");
        } else {
            $loginForm = new LoginForm();
            if ($request->isPost()) {
                $loginForm->loadData($request->getBody());
                if ($loginForm->validate()) {
                    $res = $loginForm->login();
                    if ($res === true) {
                        $response->redirect("/profile");
                        return;
                    } else {
                        return $this->render("login", [
                            "code" => 400,
                            "message" => $res
                        ]);
                    }
                }
            }
            return $this->render("login");
        }
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect("/");
    }

    public function profile(Request $request, Response $response)
    {
        $user = Application::$app->user;

        if ($request->isPost()) {
            $user->updateOne($request->getBody());
            $response->redirect("/profile");
            return;
        }

        return $this->render("profile", [
            "user" => Application::$app->user
        ]);
    }

    public function uploadImage(Request $request, Response $response)
    {
        // $target_dir = Application::$ROOT_DIR . "/public/uploads";
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $folder_path = "uploads/";
        $files = glob($folder_path.'/*'); 

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            // foreach($files as $file) {
   
            //     if(is_file($file) && $file !== $target_file) 
                
            //         // Delete the given file
            //         unlink($file); 
            // }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $user = Application::$app->user;
        $user->updateOne(["avatarName" => $target_file]);
        $response->redirect("/profile");

    }
}
