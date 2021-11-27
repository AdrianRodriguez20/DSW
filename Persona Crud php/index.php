<?php
require 'model/modelo_base.php';
require_once 'model/Connection.php';
require_once 'views/default/header.php';
require 'model/persona.model.php';
require 'model/direccion.model.php';

if($controller = isset($_REQUEST['controller'])){
    $controller=$_GET['controller'];
}else{
    $controller="persona";
}


if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}


?>