<?php

use app\core\Application;
//  var_dump (Application::$app->user) ;
// var_dump(Application::$app->user->name);

// setcookie(
//     $name = "manh1",
//     $value = "valueOfManh1",
//     $expires_or_options = time()+60*60*24*30,
//     $path = "/",
//     $domain = "127.0.0.1",
//     $secure = false,
//     $httponly = false
// );

// echo $_COOKIE['manh1'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&subset=vietnamese,latin">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Base Account</title>
</head>
<body>
    {{content}}
</body>
</html>