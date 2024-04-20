<?php

namespace php\projeto\Models\DAO;

use Exception;
use PDO;
use php\projeto\Models\Domain\Mae;

class MaeDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Mae $mae){
        try {
            $sql = "
                INSERT INTO mae 
                (
                    nome,
                    idade,
                    numero
                ) 
                VALUES (
                    :nome,
                    :idade,
                    :numero
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome",$mae->getNome());
            $p->bindValue(":idade",$mae->getIdade());
            $p->bindValue(":numero",$mae->getNumero());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function query(){
        $sql = "SELECT * FROM mae";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}