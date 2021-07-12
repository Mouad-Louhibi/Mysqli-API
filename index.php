<?php

require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[4]) && $uri[4] != 'user') || !isset($uri[5])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

require PROJECT_ROOT_PATH . "Controller/Api/UserController.php";

$objFeedController = new UserController();
$strMethodeName = $uri[5] . 'Action';
$objFeedController->{$strMethodeName}();
