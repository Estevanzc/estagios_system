<?php

namespace Controller;

use Model\DocumentoModel;
use Model\VO\DocumentoVO;

final class DocumentoController extends Controller {

    public function list() {
        $model = new DocumentoModel();
        $data = $model->selectAll(new DocumentoVO());

        $this->loadView("listaDocumentos", [
            "documentos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new DocumentoModel();
            $vo = new DocumentoVO($id);
            $documento = $model->selectOne($vo);
        } else {
            $documento = new DocumentoVO();
        }

        $this->loadView("formDocumento", [
            "documento" => $documento
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new DocumentoModel();
        $vo = new DocumentoVO($id, $_POST["tipo"], $_POST["nome"], $_POST["id_contrato"]);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("contratos.php");
    }

    public function remove() {
        $vo = new DocumentoVO($_GET["id"]);
        $model = new DocumentoModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("contratos.php");
    }

}
