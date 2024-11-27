<?php

namespace Model\VO;

final class DocumentoVO extends VO {

    private $tipo;
    private $nome;
    private $id_contrato;

    public function __construct($id = 0, $tipo = "", $nome = "", $id_contrato = 0) {
        parent::__construct($id);
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->id_contrato = $id_contrato;
    }

    public function getNome() { 
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getTipo() { 
        return $this->tipo;
    }
    public function setTipo($tipo) { 
        $this->tipo = $tipo;
    }
    public function getId_contrato() { 
        return $this->id_contrato;
    }
    public function setId_contrato($id_contrato) { 
        $this->id_contrato = $id_contrato;
    }

}