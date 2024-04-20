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

$r->get('/exer6/formulario', function(){
    include("public/exer6.html");
});

$r->post('/exer6/resposta', function(){
    $valorA = $_POST['valorA'];
    $valorB = $_POST['valorB'];

    if ($valorA == $valorB) {
        echo "<p>Números iguais: $valorA</p>";
    } else {
        $menor = min($valorA, $valorB);
        $maior = max($valorA, $valorB);
        echo "<p>$menor $maior</p>";
    }
});

$r->get('/exer7/formulario', function(){
    include("public/exer7.html");
});

$r->post('/exer7/resposta', function(){
    $metros = $_POST['metros'];

    $centimetros = $metros * 100;
    echo "<p>$metros metros equivalem a $centimetros centímetros.</p>";
});

$r->get('/exer8/formulario', function(){
    include("public/exer8.html");
});

$r->post('/exer8/resposta', function(){
    $metros_quadrados = $_POST['metros_quadrados'];

    $litros_tinta = $metros_quadrados / 3;
    $latas_tinta = ceil($litros_tinta / 18);
    $preco_total = $latas_tinta * 80;

    echo "<p>Para pintar uma área de $metros_quadrados metros quadrados, você precisará de:</p>";
    echo "<p>- $litros_tinta litros de tinta;</p>";
    echo "<p>- $latas_tinta latas de tinta;</p>";
    echo "<p>O preço total será de R$ $preco_total.</p>";
});

$r->get('/exer9/formulario', function(){
    include("public/exer9.html");
});

$r->post('/exer9/resposta', function(){
     $ano_nascimento = $_POST['ano_nascimento'];

     $ano_atual = date('Y');
     $idade = $ano_atual - $ano_nascimento;
     $dias_vividos = $idade * 365;
     $idade_2025 = 2025 - $ano_nascimento;

     echo "<p>A idade desta pessoa é: $idade anos.</p>";
     echo "<p>Esta pessoa já viveu aproximadamente $dias_vividos dias.</p>";
     echo "<p>Em 2025, esta pessoa terá $idade_2025 anos.</p>";
});

$r->get('/exer10/formulario', function(){
    include("public/exer10.html");
});

$r->post('/exer10/resposta', function(){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura * $altura);

    if ($imc < 18.5) {
        $condicao = "abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 25) {
        $condicao = "com peso normal";
    } elseif ($imc >= 25 && $imc < 30) {
        $condicao = "com sobrepeso";
    } else {
        $condicao = "com obesidade";
    }

    echo "<p>Seu IMC é: $imc.</p>";
    echo "<p>Você está $condicao.</p>";
    echo "<p>Para mais informações sobre o Índice de Massa Corporal, consulte: <a href='https://www.tuasaude.com/imc/'>tuasaude.com</a></p>";
});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());