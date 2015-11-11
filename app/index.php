<?php
$url = isset($_GET["url"]) ? explode("/", trim($_GET["url"])) : [];


$controller = "usuario";
$metodo = "index";

if(isset($URL[0]) && file_exists("controller/" . $url[0] . ".php")){
    $controller = $url[0];
    unset($url[0]);
}

require_once "controller/" . $controller . ".php";
$controller = new $controller;

if(isset($url[1]) && method_exists($controller, $url[1])){
    $metodo = $url[1];
    unset($url[1]);
}

$controller->$metodo();