<?php

namespace php\projeto\Models\Domain;

class Vinculacao {
    private int $id;
    private int $medico;
    private int $mae;
    private int $bebe;

    public function __construct(int $id,int $medico, int $mae,int $bebe) {
        $this->setId($id);
        $this->setMedico($medico);
        $this->setMae($mae);
        $this->setBebe($bebe);
    }

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id):void {
        $this->id = $id;
    }

    public function getMedico():int {
        return $this->medico;
    }

    public function setMedico(int $medico):void {
        $this->medico = $medico;
    }

    public function getMae():int {
        return $this->mae;
    }

    public function setMae(int $mae):void {
        $this->mae = $mae;
    }

    public function getBebe():int {
        return $this->bebe;
    }

    public function setBebe(int $bebe):void {
        $this->bebe = $bebe;
    }

}