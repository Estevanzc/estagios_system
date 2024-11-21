<?php

namespace Model\VO;

final class BancaVO extends VO {

    private $nome;
    private $email;
    private $id_contrato;

    public function __construct($id = 0, $nome = "", $email = "", $id_contrato = 0) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
        $this->id_contrato = $id_contrato;
    }

    public function getNome() { 
        return $this->nome; 
    }
    public function setNome($nome) { 
        $this->nome = $nome; 
    }
    public function getEmail() { 
        return $this->email; 
    }
    public function setEmail($email) { 
        $this->email = $email; 
    }
    public function getId_contrato() { 
        return $this->id_contrato; 
    }
    public function setId_contrato($id_contrato) { 
        $this->id_contrato = $id_contrato; 
    }

}