<?php
session_start();
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/config.php";
require_once './routerModificadoParaFuncionEnAny.php';
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__.'/..'); //para acceder al archivo .env
$dotenv->safeLoad();
const PATH="/EntornoServidor/NuevoProyectoPracticandoTodo/public";

use controllers\FrontController;
use controllers\usuarioController;
use controllers\productoController;

get(PATH, function (){
    $productoController=new productoController();
    $productoController->showIndex();
});

get(PATH.'/CreateAccount', function (){
    $usuarioController=new usuarioController();
    $usuarioController->registro();
});
post(PATH.'/CreateAccount', function (){
    $usuarioController=new usuarioController();
    $usuarioController->registro();
});
get(PATH.'/otracosa', function (){
    $controller=new usuarioController();

    $controller->login();
});

any('/404', function (){
    $controller=new usuarioController();

    $controller->login();
});
?>
