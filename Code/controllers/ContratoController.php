<?php

namespace Controller;

use Model\ContratoModel;
use Model\EstudanteModel;
use Model\ProfessorModel;
use Model\DocumentoModel;
use Model\BancaModel;
use Model\CursoModel;
use Model\EmpresaModel;
use Model\VO\EstudanteVO;
use Model\VO\ProfessorVO;
use Model\VO\EmpresaVO;
use Model\VO\ContratoVO;
use Model\VO\CursoVO;
use Model\VO\DocumentoVO;

final class ContratoController extends Controller {

    public function list() {
        $model = new ContratoModel();
        $user_nivel = (int) $_SESSION["usuario"]->getNivel();
        //echo($user_nivel);
        $contrato_fk = ["id_estudante", "id_professor", "id_empresa", ""][$user_nivel-1];
        //echo($contrato_fk);

        if ($user_nivel != 4) {
            $user_id = 0;
            if ($user_nivel == 1) {
                $user_id = (new EstudanteModel)->selectIdByEmail($_SESSION["usuario"]->getLogin());
            } else if ($user_nivel == 2) {
                $user_id = (new ProfessorModel)->selectIdByEmail($_SESSION["usuario"]->getLogin());
            } else if ($user_nivel == 3) {
                $user_id = (new EmpresaModel)->selectIdByEmail($_SESSION["usuario"]->getLogin());
            }
            $data = $model->selectAllById(new ContratoVO(), $contrato_fk, $user_id);
        } else {
            $data = $model->selectAll(new ContratoVO());
        }
        $estudante = (new EstudanteModel())->selectAll(new EstudanteVO());
        $empresa = (new EmpresaModel())->selectAll(new EmpresaVO());
        $professor = (new ProfessorModel())->selectAll(new ProfessorVO());
        $curso = (new CursoModel())->selectAll(new CursoVO());
        $documentos = (new DocumentoModel())->selectAll(new DocumentoVO());
        $this->loadView("listaContratos", [
            "contratos" => $data,
            "estudantes" => $estudante,
            "professores" => $professor,
            "empresas" => $empresa,
            "cursos" => $curso,
            "documentos" => $documentos
        ]);
    }
    public function listOne($id_contrato) {
        $model = new ContratoModel();
        $data = $model->selectOne(new ContratoVO($id_contrato));

        $estudante = (new EstudanteModel())->selectAll(new EstudanteVO());
        $empresa = (new EmpresaModel())->selectAll(new EmpresaVO());
        $professor = (new ProfessorModel())->selectAll(new ProfessorVO());
        $cursos = (new CursoModel())->selectAll(new CursoVO());
        $bancas = (new BancaModel())->selectBycontrato($data->getId());
        $documentos = (new DocumentoModel())->selectBycontrato($data->getId());
        $this->loadView("infoContrato", [
            "contratos" => $data,
            "estudantes" => $estudante,
            "professores" => $professor,
            "empresas" => $empresa,
            "bancas" => $bancas,
            "cursos" => $cursos,
            "documentos" => $documentos
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
        $estudante = (new EstudanteModel())->selectAll(new EstudanteVO());
        $empresa = (new EmpresaModel())->selectAll(new EmpresaVO());
        $professor = (new ProfessorModel())->selectAll(new ProfessorVO());
        $this->loadView("formContrato", [
            "contrato" => $contrato,
            "estudantes" => $estudante,
            "professores" => $professor,
            "empresas" => $empresa
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