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
        
        $body = $request->getBody();
        var_dump($body);

        return $this->render("register");
    }
}
?>