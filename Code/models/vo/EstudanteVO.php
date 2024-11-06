<?php

namespace Model\VO;

final class EstudanteVO extends VO {

    private $nome;
    private $email;
    private $matricula;
    private $cpf;
    private $rg;
    private $cidade;
    private $endereco;
    private $telefone;
    private $foto;

    public function __construct($id = 0, $nome = "", $email = "", $matricula = "", $cpf = "", $rg = "", $cidade = "", $endereco = "", $telefone = "", $foto = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
        $this->matricula = $matricula;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->foto = $foto;
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
    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }
    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

}