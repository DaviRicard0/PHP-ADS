<?php

namespace php\projeto\Models\Domain;

class Mae {
    private int $id;
    private string $nome;
    private int $idade;
    private string $numero;

    public function __construct(int $id,string $nome, int $idade,string $numero) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setNumero($numero);
    }

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id):void {
        $this->id = $id;
    }

    public function getNome():string {
        return $this->nome;
    }

    public function setNome(string $nome):void {
        $this->nome = $nome;
    }

    public function getIdade():int {
        return $this->idade;
    }

    public function setIdade(int $idade):void {
        $this->idade = $idade;
    }

    public function getNumero():string {
        return $this->numero;
    }

    public function setNumero(string $numero):void {
        $this->numero = $numero;
    }

}