<?php

namespace php\projeto\Models\Domain;

class Bebe {
    private int $id;
    private string $nome;
    private float $peso;
    private int $sexo;

    public function __construct(int $id,string $nome, float $peso,int $sexo) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setPeso($peso);
        $this->setSexo($sexo);
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

    public function getPeso():float {
        return $this->peso;
    }

    public function setPeso(float $peso):void {
        $this->peso = $peso;
    }

    public function getSexo():int {
        return $this->sexo;
    }

    public function setSexo(int $sexo):void {
        $this->sexo = $sexo;
    }

}