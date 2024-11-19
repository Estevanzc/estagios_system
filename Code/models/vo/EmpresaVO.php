<?php

namespace Model\VO;

final class EmpresaVO extends VO {
    
    private $nome;
    private $email;
    private $cnpj;
    private $representante;
    private $r_funcao;
    private $r_cpf;
    private $r_rg;
    private $cidade;
    private $endereco;
    private $telefone;
    private $convenio;

    public function __construct($id = 0, $nome = "", $email = "", $cnpj = "", $representante = "", $r_funcao = "", $r_cpf = "", $r_rg = "", $cidade = "", $endereco = "", $telefone = "", $convenio = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
        $this->cnpj = $cnpj;
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
        return $this->r_rg;
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