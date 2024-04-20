<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\VinculacaoDAO;
use php\projeto\Models\DAO\MaeDAO;
use php\projeto\Models\DAO\BebeDAO;
use php\projeto\Models\DAO\MedicoDAO;
use php\projeto\Models\Domain\Vinculacao;

class VinculacaoController {
    public function index(){
        $maeDAO = new MaeDAO();
        $bebeDAO = new BebeDAO();
        $medicoDAO = new MedicoDAO();

        $listMae = $maeDAO->query();
        $listBebe = $bebeDAO->query();
        $listMedico = $medicoDAO->query();
        require_once("../src/Views/vinculacao/index.php");
    }

    public function create() {
        $vinculacao = new Vinculacao(0,(int)$_POST["mae"],(int)$_POST["medico"],(int)$_POST["bebe"]);
        $vinculacaoDAO = new VinculacaoDAO();

        if ($vinculacaoDAO->create($vinculacao)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}