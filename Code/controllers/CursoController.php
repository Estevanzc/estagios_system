<?php

namespace Controller;

use Model\CursoModel;
use Model\EstudanteModel;
use Model\VO\CursoVO;
use Model\VO\EstudanteVO;

final class CursoController extends Controller {

    public function list() {
        $model = new CursoModel();
        $data = $model->selectAll(new CursoVO());

        $estudantes = (new EstudanteModel())->selectAll(new EstudanteVO());
        $this->loadView("listaCursos", [
            "cursos" => $data,
            "estudantes" => $estudantes
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new CursoModel();
            $vo = new CursoVO($id);
            $curso = $model->selectOne($vo);
        } else {
            $curso = new CursoVO();
        }

        $this->loadView("formCurso", [
            "curso" => $curso
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