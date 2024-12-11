<?php

namespace Model\VO;

final class EstudanteVO extends VO {

    private $nome;
    private $email;
    private $matricula;
    private $matricula_ativa;
    private $ano_curso;
    private $cpf;
    private $rg;
    private $data_nasc;
    private $res_nome;
    private $res_email;
    private $cidade;
    private $endereco;
    private $telefone;
    private $id_curso;
    private $foto;

    public function __construct($id = 0, $nome = "", $email = "", $matricula = "", $matricula_ativa = false, $ano_curso = "", $cpf = "", $rg = "", $data_nasc = "", $res_nome = "", $res_email = "", $cidade = "", $endereco = "", $telefone = "", $id_curso = 0, $foto = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->email = $email;
        $this->matricula = $matricula;
        $this->matricula_ativa = $matricula_ativa;
        $this->ano_curso = $ano_curso;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->data_nasc = $data_nasc;
        $this->res_nome = $res_nome;
        $this->res_email = $res_email;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->id_curso = $id_curso;
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

    public function getMatricula_ativa() {
        return $this->matricula_ativa;
    }

    public function setMatricula_ativa($matricula_ativa) {
        $this->matricula_ativa = $matricula_ativa;
    }

    public function getData_nasc() {
        return $this->data_nasc;
    }

    public function setData_nasc($data_nasc){
        $this->data_nasc = $data_nasc;
    }

    public function getRes_nome() {
        return $this->res_nome;
    }

    public function setRes_nome($res_nome){
        $this->res_nome = $res_nome;
    }
    
    public function getRes_email() {
        return $this->res_email;
    }

    public function setRes_email($res_email){
        $this->res_email = $res_email;
    }

    public function getId_curso(){
        return $this->id_curso;
    }
    public function setId_curso($id_curso){
        $this->id_curso = $id_curso;
    }
    public function getAno_curso(){
        return $this->ano_curso;
    }
    public function setAno_curso($ano_curso){
        $this->ano_curso = $ano_curso;
    }
}