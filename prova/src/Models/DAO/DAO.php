<?php

namespace php\projeto\Models\DAO;

use PDO;

class DAO {
    private PDO $conexao;

    public function __construct() {
        $this->conexao = new PDO("mysql:host=localhost;dbname=projeto","root", "");
    }

    /**
     * @return mixed
     */
    public function getConexao() : PDO {
        return $this->conexao;
    }
}