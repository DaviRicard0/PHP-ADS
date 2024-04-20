<?php

namespace php\projeto\Models\DAO;

use Exception;
use PDO;
use php\projeto\Models\Domain\Medico;

class MedicoDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Medico $medico){
        try {
            $sql = "
                INSERT INTO medico 
                (
                    nome,
                    crm,
                    numero
                ) 
                VALUES (
                    :nome,
                    :crm,
                    :numero
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome",$medico->getNome());
            $p->bindValue(":crm",$medico->getCrm());
            $p->bindValue(":numero",$medico->getNumero());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function query(){
        $sql = "SELECT * FROM medico";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}