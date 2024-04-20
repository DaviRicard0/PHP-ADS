<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new php\projeto\Router($metodo, $caminho);

#ROTAS

$r->get('/','php\projeto\Controllers\HomeController@index');
$r->get('/medico','php\projeto\Controllers\MedicoController@index');
$r->post('/medico','php\projeto\Controllers\MedicoController@create');
$r->get('/mae','php\projeto\Controllers\MaeController@index');
$r->post('/mae','php\projeto\Controllers\MaeController@create');
$r->get('/bebe','php\projeto\Controllers\BebeController@index');
$r->post('/bebe','php\projeto\Controllers\BebeController@create');
$r->get('/vinculacao','php\projeto\Controllers\VinculacaoController@index');
$r->post('/vinculacao','php\projeto\Controllers\VinculacaoController@create');

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure) {
    echo $resultado($r->getParams());
}elseif(is_string($resultado)){
    $resultado = explode('@',$resultado);
    $controller = new $resultado[0];
    $action = $resultado[1];

    echo $controller->$action($r->getParams());
}