<?php

namespace Model\VO;

final class EmpresaVO extends VO {
    
    private $nome;
    private $email;
    private $cnpj;
    private $supervisor;
    private $s_cargo;
    private $s_telefone;
    private $s_email;
    private $representante;
    private $r_funcao;
    private $r_cpf;
    private $r_rg;
    private $cidade;
    private $endereco;
    private $telefone;
    private $convenio;

    public function __construct($id = 0, $nome = "", $email = "", $cnpj = "", $supervisor = "", $s_cargo = "", $s_telefone = "", $s_email = "", $representante = "", $r_funcao = "", $r_cpf = "", $r_rg = "", $cidade = "", $endereco = "", $telefone = "", $convenio = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
        $this->cnpj = $cnpj;
        $this->supervisor = $supervisor;
        $this->s_cargo = $s_cargo;
        $this->s_telefone = $s_telefone;
        $this->s_email = $s_email;
        $this->representante = $representante;
        $this->r_funcao = $r_funcao;
        $this->r_cpf = $r_cpf;
        $this->r_rg = $r_rg;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->convenio = $convenio;
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
    public function getSupervisor() {
        return $this->supervisor;
    }

    public function setSupervisor($supervisor) {
        $this->supervisor = $supervisor;
    }
    public function getS_cargo() {
        return $this->s_cargo;
    }

    public function setS_cargo($s_cargo) {
        $this->s_cargo = $s_cargo;
    }
    public function getS_telefone() {
        return $this->s_telefone;
    }

    public function setS_telefone($s_telefone) {
        $this->s_telefone = $s_telefone;
    }
    public function getS_email() {
        return $this->s_email;
    }

    public function setS_email($s_email) {
        $this->s_email = $s_email;
    }
    public function getRepresentante() {
        return $this->representante;
    }

    public function setRepresentante($representante) {
        $this->representante = $representante;
    }
    public function getR_cpf() {
        return $this->r_cpf;
    }

    public function setR_cpf($r_cpf) {
        $this->r_cpf = $r_cpf;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    
    public function getR_Funcao() {
        return $this->r_funcao;
    }

    public function setR_Funcao($r_funcao) {
        $this->r_funcao = $r_funcao;
    }
    public function getR_rg() {
        return $this->r_funcao;
    }

    public function setR_rg($r_rg) {
        $this->r_rg = $r_rg;
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
    public function getConvenio() {
        return $this->convenio;
    }

    public function setConvenio($convenio) {
        $this->convenio = $convenio;
    }

}