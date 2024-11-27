<?php

namespace Controller;

use Model\ProfessorModel;
use Model\UsuarioModel;
use Model\VO\ProfessorVO;
use Model\VO\UsuarioVO;

final class ProfessorController extends Controller {

    public function list() {
        $model = new ProfessorModel();
        $data = $model->selectAll(new ProfessorVO());

        $this->loadView("listaProfessores", [
            "professores" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new ProfessorModel();
            $vo = new ProfessorVO($id);
            $professor = $model->selectOne($vo);
        } else {
            $professor = new ProfessorVO();
        }

        $this->loadView("formProfessor", [
            "professor" => $professor
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new ProfessorModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], (empty($id) ? "" : $model->selectOne(new ProfessorVO($id))->getFoto()));
        $vo = new ProfessorVO($id, $_POST["nome"], $_POST["email"], $_POST["siape"], $_POST["cpf"], $_POST["rg"], $_POST["cidade"], $_POST["endereco"], $_POST["telefone"], $_POST["funcao"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
            (new UsuarioModel())->insert(new UsuarioVO(null, $vo["email"], $vo["cpf"], 2, $nome_arquivo));
        } else {
            $id_usuario = (new UsuarioModel())->selectByemail($model->selectOne($vo)["email"]);
            $result = $model->update($vo);
            (new UsuarioModel())->update(new UsuarioVO($id_usuario, $vo->getEmail(), null, 2, $vo->getFoto()));
        }

        $this->redirect("professores.php");
    }

    public function remove() {
        $vo = new ProfessorVO($_GET["id"]);
        $model = new ProfessorModel();
        $vo = $model->selectOne($vo);
        (new UsuarioModel())->delete(new UsuarioVO(null, $vo["email"]));

        $result = $model->delete($vo);

        $this->redirect("professores.php");
    }

}