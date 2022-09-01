<?php
require_once __DIR__."/../vendor/autoload.php";

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

$config = [
    "db" => [
        "dsn" => "mysql:host=127.0.0.1;port=3306;dbname=baa",
        "user" => "root",
        "password" => ""
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get("/", [SiteController::class, "home"]);

$app->router->get("/register", [AuthController::class, "register"]);
$app->router->post("/register", [AuthController::class, "register"]);

$app->router->get("/login", [AuthController::class, "login"]);
$app->router->post("/login", [AuthController::class, "login"]);

$app->router->get("/profile", [AuthController::class, "profile"]);
$app->router->post("/profile", [AuthController::class, "profile"]);

$app->router->get("/logout", [AuthController::class, "logout"]);

$app->run();
?>