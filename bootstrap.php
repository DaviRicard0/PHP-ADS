<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){ 
    return 'Olá'.$params[1]; 
} );

$r->get('/exer1/formulario', function(){
    include("public/exer1.html");
});

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

$r->get('/exer2/formulario', function(){
    include("public/exer2.php");
});

$r->post('/exer2/resposta', function(){
    $numeros = $_POST['numeros'];
    $menorValor = min($numeros);

    echo "<p>O menor valor é: $menorValor</p>";
    echo "<p>A posição do menor valor na sequência de entrada é: " . (array_search($menorValor,$numeros) + 1) . "</p>";
});

$r->get('/exer3/formulario', function(){
    include("public/exer3.html");
});

$r->post('/exer3/resposta', function(){
    $valor1 = (int)$_POST["valor1"];
    $valor2 = (int)$_POST["valor2"];
    $soma = $valor1 + $valor2;

    if ($valor1 == $valor2) {
        $soma = 3 * $soma;
    }

    echo "<h2>Resultado da Soma</h2>";
    echo "<p>O resultado da soma é: $soma</p>";
});

$r->get('/exer4/formulario', function(){
    include("public/exer4.html");
});

$r->post('/exer4/resposta', function(){
    $numero = (int)$_POST["numero"];

    echo "Tabuada de $numero:<br>";
    for ($i = 0; $i <= 10; $i++) {
        echo "$numero x $i = " . ($numero * $i) . "<br>";
    }
});

$r->get('/exer5/formulario', function(){
    include("public/exer5.html");
});

$r->post('/exer5/resposta', function(){
    $num = (int)$_POST["numero"];

    $calc = 1;
    $numero = $num;
    while ($numero > 1){
        $calc *= $numero;
        $numero--;
    }
 
    echo "O fatorial de $num é $calc";   
});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());