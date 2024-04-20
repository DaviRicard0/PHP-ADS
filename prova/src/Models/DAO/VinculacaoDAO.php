<?php

namespace php\projeto\Models\DAO;

use Exception;
use PDO;
use php\projeto\Models\Domain\Vinculacao;

class VinculacaoDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Vinculacao $vinculacao){
        try {
            $sql = "
                INSERT INTO vinculacao 
                (
                    medico_id,
                    mae_id,
                    bebe_id
                ) 
                VALUES (
                    :medico_id,
                    :mae_id,
                    :bebe_id
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":medico_id",$vinculacao->getMedico());
            $p->bindValue(":mae_id",$vinculacao->getMae());
            $p->bindValue(":bebe_id",$vinculacao->getBebe());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }
}