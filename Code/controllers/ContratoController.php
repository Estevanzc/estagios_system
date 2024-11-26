<?php

namespace Controller;

use Model\ContratoModel;
use Model\EstudanteModel;
use Model\ProfessorModel;
use Model\EmpresaModel;
use Model\VO\EstudanteVO;
use Model\VO\ProfessorVO;
use Model\VO\EmpresaVO;
use Model\VO\ContratoVO;

final class ContratoController extends Controller {

    public function list() {
        $model = new ContratoModel();
        $data = $model->selectAll(new ContratoVO());

        $estudante = (new EstudanteModel())->selectAll(new EstudanteVO());
        $empresa = (new EmpresaModel())->selectAll(new EmpresaVO());
        $professor = (new ProfessorModel())->selectAll(new ProfessorVO());
        $this->loadView("listaContratos", [
            "contratos" => $data,
            "estudante" => $estudante,
            "professor" => $professor,
            "empresa" => $empresa
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new ContratoModel();
            $vo = new ContratoVO($id);
            $contrato = $model->selectOne($vo);
        } else {
            $contrato = new ContratoVO();
        }
        $estudante = (new EstudanteModel())->selectOne((int) $contrato["id_estudante"]);
        $empresa = (new EmpresaModel())->selectOne((int) $contrato["id_empresa"]);
        $professor = (new ProfessorModel())->selectOne((int) $contrato["id_professor"]);
        $this->loadView("formContrato", [
            "contrato" => $contrato,
            "estudante" => $estudante,
            "professor" => $professor,
            "empresa" => $empresa
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new ContratoModel();
        $vo = new ContratoVO($id, $_POST["nome"], $_POST["encaminhamento"], $_POST["area"], $_POST["data_inicio"], $_POST["data_fim"], $_POST["media_final"], $_POST["supervisor"], $_POST["s_cargo"], $_POST["s_telefone"], $_POST["s_email"], $_POST["observacao"], $_POST["encerramento"], $_POST["id_empresa"], $_POST["id_estudante"], $_POST["id_professor"]);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("contratos.php");
    }

    public function remove() {
        $vo = new ContratoVO($_GET["id"]);
        $model = new ContratoModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("contratos.php");
    }

}