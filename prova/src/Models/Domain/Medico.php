<?php

namespace php\projeto\Models\Domain;

class Medico {
    private int $id;
    private string $nome;
    private int $crm;
    private string $numero;

    public function __construct(int $id,string $nome, int $crm,string $numero) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setCrm($crm);
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

    public function getCrm():int {
        return $this->crm;
    }

    public function setCrm(int $crm):void {
        $this->crm = $crm;
    }

    public function getNumero():string {
        return $this->numero;
    }

    public function setNumero(string $numero):void {
        $this->numero = $numero;
    }

}