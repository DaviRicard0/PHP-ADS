<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\MedicoDAO;
use php\projeto\Models\Domain\Medico;

class MedicoController {
    public function index(){
        require_once("../src/Views/medico/index.html");
    }

    public function create() {
        $medico = new Medico(0,$_POST["nome"],(int)$_POST["crm"],$_POST["numero"]);
        $medicoDAO = new MedicoDAO();

        if ($medicoDAO->create($medico)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}