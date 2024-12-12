<?php

namespace Controller;

use Model\EstudanteModel;
use Model\UsuarioModel;
use Model\CursoModel;
use Model\ContratoModel;
use Model\VO\EstudanteVO;
use Model\VO\UsuarioVO;
use Model\VO\CursoVO;
use Model\VO\ContratoVO;

final class EstudanteController extends Controller {

    public function list() {
        $model = new EstudanteModel();
        $data = $model->selectAll(new EstudanteVO());

        $curso = (new CursoModel())->selectAll(new CursoVO());
        $contrato = (new ContratoModel())->selectAll(new ContratoVO());
        $this->loadView("listaEstudantes", [
            "estudantes" => $data,
            "cursos" => $curso,
            "contratos" => $contrato
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new EstudanteModel();
            $vo = new EstudanteVO($id);
            $estudante = $model->selectOne($vo);
        } else {
            $estudante = new EstudanteVO();
        }

        $curso = (new CursoModel())->selectAll(new CursoVO());
        $this->loadView("formEstudante", [
            "estudante" => $estudante,
            "cursos" => $curso,
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new EstudanteModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], (empty($id) ? "" : $model->selectOne(new EstudanteVO($id))->getFoto()));
        $vo = new EstudanteVO($id, $_POST["nome"], $_POST["email"], $_POST["matricula"], $_POST["matricula_ativa"], $_POST["ano_curso"], $_POST["cpf"], $_POST["rg"], $_POST["data_nasc"], $_POST["res_nome"], $_POST["res_email"], $_POST["cidade"], $_POST["endereco"], $_POST["telefone"], (int) $_POST["id_curso"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
            (new UsuarioModel())->insert(new UsuarioVO(null, $vo["email"], $vo["cpf"], 1, $nome_arquivo));
        } else {
            $id_usuario = (new UsuarioModel())->selectByemail($model->selectOne($vo)["email"]);
            $result = $model->update($vo);
            (new UsuarioModel())->update(new UsuarioVO($id_usuario, $vo->getEmail(), null, 1, $vo->getFoto()));
        }

        $this->redirect("estudantes.php");
    }

    public function remove() {
        $vo = new EstudanteVO($_GET["id"]);
        $model = new EstudanteModel();
        $vo = $model->selectOne($vo);
        (new UsuarioModel())->delete(new UsuarioVO(null, $vo["email"]));

        $result = $model->delete($vo);

        $this->redirect("estudantes.php");
    }

}