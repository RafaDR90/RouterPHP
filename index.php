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
// Ruta por defecto
get(PATH, function (){
    $productoController=new productoController();
    $productoController->showIndex();
});

post(PATH.'/CreateAccount', function (){
    $usuarioController=new usuarioController();
    $usuarioController->registro();
});
get(PATH.'/Login', function (){
    $controller=new usuarioController();

    $controller->login();
});
//Ruta para cualquier ruta que no exista
any('/404', function (){
    $productoController=new productoController();
    $productoController->showIndex();
});
?>
