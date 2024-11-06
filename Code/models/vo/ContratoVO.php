<?php

namespace Model\VO;

final class ContratoVO extends VO {

    private $processo;
    private $encaminhamento;
    private $area;
    private $data_inicio;
    private $data_fim;
    private $carga_horaria;
    private $id_empresa;
    private $id_estudante;
    private $id_professor;

    public function __construct($id = 0, $processo = "", $encaminhamento = false, $area = "", $data_inicio = null, $data_fim = null, $carga_horaria = 0, $id_empresa = 0, $id_estudante = 0, $id_professor = 0) {
        parent::__construct($id);
        $this->processo = $processo;
        $this->encaminhamento = $encaminhamento;
        $this->area = $area;
        $this->data_inicio = $data_inicio;
        $this->data_fim = $data_fim;
        $this->carga_horaria = $carga_horaria;
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

    public function getCarga_horaria() {
        return $this->carga_horaria;
    }

    public function setCarga_horaria($carga_horaria) {
        $this->carga_horaria = $carga_horaria;
    }

    public function getId_empresa() {
        return $this->id_empresa;
    }

    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
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

}