<?php

namespace Model\VO;

final class CursoVO extends VO {

    private $nome;
    private $carga_horaria;

    public function __construct($id = 0, $nome = "", $carga_horaria = 0) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->carga_horaria = $carga_horaria;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCarga_horaria() {
        return $this->carga_horaria;
    }

    public function setCarga_horaria($carga_horaria) {
        $this->carga_horaria = $carga_horaria;
    }
}