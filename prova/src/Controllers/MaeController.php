<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\MaeDAO;
use php\projeto\Models\Domain\Mae;

class MaeController {
    public function index(){
        require_once("../src/Views/mae/index.html");
    }

    public function create() {
        $mae = new Mae(0,$_POST["nome"],(int)$_POST["idade"],$_POST["numero"]);
        $maeDAO = new MaeDAO();

        if ($maeDAO->create($mae)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}