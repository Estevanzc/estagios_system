<?php

namespace Controller;

use Model\CursoModel;
use Model\VO\CursoVO;

final class CursoController extends Controller {

    public function list() {
        $model = new CursoModel();
        $data = $model->selectAll(new CursoVO());

        $this->loadView("listaCurso", [
            "cursos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new CursoModel();
            $vo = new CursoVO($id);
            $aluno = $model->selectOne($vo);
        } else {
            $aluno = new CursoVO();
        }

        $this->loadView("formCurso", [
            "curso" => $aluno
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new CursoModel();
        $vo = new CursoVO($id, $_POST["nome"], $_POST["carga_horaria"]);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("cursos.php");
    }

    public function remove() {
        $vo = new CursoVO($_GET["id"]);
        $model = new CursoModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("cursos.php");
    }

}