<?php
namespace app\core;

use app\models\User;

class Application { 
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Session $session;
    public Database $db;
    public ?DbModel $user;

    public function __construct($rootPath, array $config) {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request,  $this->response);
        $this->db = new Database($config["db"]);

        $primaryValue = $this->session->get("user");
        
        if ($primaryValue) {
            $userObj = new User();
            $primaryKey = $userObj->primaryKey();
            $this->user = $userObj->findOne([$primaryKey => $primaryValue]);
        }
        else {
            $this->user = null;
        }

    }

    public function run() {
        echo $this->router->resolve();
    }

    public function login(DbModel $user) {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        
        $this->session->set("user", $primaryValue);
        return true;
    }

    public function logout(DbModel $user) {
        $this->user = null;
        $this->session->remove("user");
    }
}
?>