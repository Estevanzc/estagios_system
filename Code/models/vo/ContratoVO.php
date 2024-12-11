<?php

namespace Model\VO;

final class ContratoVO extends VO {

    private $processo;
    private $encaminhamento;
    private $area;
    private $data_inicio;
    private $data_fim;
    private $media_final;
    private $supervisor;
    private $s_cargo;
    private $s_telefone;
    private $s_email;
    private $observacao;
    private $encerramento;
    private $id_empresa;
    private $id_estudante;
    private $id_professor;

    public function __construct($id = 0, $processo = "", $encaminhamento = false, $area = "", $data_inicio = "", $data_fim = "", $media_final = 0, $supervisor = "", $s_cargo = "", $s_telefone = "", $s_email = "", $observacao = "", $encerramento = false, $id_empresa = 0, $id_estudante = 0, $id_professor = 0) {
        parent::__construct($id);
        $this->processo = $processo;
        $this->encaminhamento = $encaminhamento;
        $this->area = $area;
        $this->data_inicio = $data_inicio;
        $this->data_fim = $data_fim;
        $this->media_final = $media_final;
        $this->supervisor = $supervisor;
        $this->s_cargo = $s_cargo;
        $this->s_telefone = $s_telefone;
        $this->s_email = $s_email;
        $this->observacao = $observacao;
        $this->encerramento = $encerramento;
        $this->id_empresa = $id_empresa;
        $this->id_estudante = $id_estudante;
        $this->id_professor = $id_professor;
    }

    public function getProcesso() {
        return $this->processo;
    }

    public function setProcesso($processo) {
        $this->processo = $processo;
    }

    public function getEncaminhamento() {
        return $this->encaminhamento;
    }

    public function setEncaminhamento($encaminhamento) {
        $this->encaminhamento = $encaminhamento;
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($area) {
        $this->area = $area;
    }

    public function getData_inicio() {
        return $this->data_inicio;
    }

    public function setData_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    public function getData_fim() {
        return $this->data_fim;
    }

    public function setData_fim($data_fim) {
        $this->data_fim = $data_fim;
    }

    public function getId_empresa() {
        return $this->id_empresa;
    }

    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getEncerramento() {
        return $this->encerramento;
    }

    public function setEncerramento($encerramento) {
        $this->encerramento = $encerramento;
    }

    public function getId_estudante() {
        return $this->id_estudante;
    }

    public function setId_estudante($id_estudante) {
        $this->id_estudante = $id_estudante;
    }

    public function getId_professor() {
        return $this->id_professor;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function getMedia_final() {
        return $this->media_final;
    }

    public function setMedia_final($media_final) {
        $this->media_final = $media_final;
    }

    public function getSupervisor() {
        return $this->supervisor;
    }

    public function setSupervisor($supervisor) {
        $this->supervisor = $supervisor;
    }

    public function getS_Cargo() {
        return $this->s_cargo;
    }

    public function setS_Cargo($s_cargo) {
        $this->s_cargo = $s_cargo;
    }

    public function getS_Telefone() {
        return $this->s_telefone;
    }

    public function setS_Telefone($s_telefone) {
        $this->s_telefone = $s_telefone;
    }

    public function getS_Email() {
        return $this->s_email;
    }

    public function setS_Email($s_email) {
        $this->s_email = $s_email;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }
}