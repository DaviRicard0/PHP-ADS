<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\BebeDAO;
use php\projeto\Models\Domain\Bebe;

class BebeController {
    public function index(){
        require_once("../src/Views/bebe/index.html");
    }

    public function create() {
        $bebe = new Bebe(0,$_POST["nome"],(float)$_POST["peso"],(int)$_POST["sexo"]);
        $bebeDAO = new BebeDAO();

        if ($bebeDAO->create($bebe)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}