<?php

namespace Controller;

use Model\DocumentoModel;
use Model\ContratoModel;
use Model\VO\DocumentoVO;
use Model\VO\ContratoVO;

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

        $contratos = (new ContratoModel())->selectAll(new ContratoVO());
        $this->loadView("formDocumento", [
            "documento" => $documento,
            "contratos" => $contratos
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new DocumentoModel();
        $vo = new DocumentoVO($id, $_POST["tipo"], $_POST["nome"], (int) $_POST["id_contrato"]);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("documentos.php");
    }

    public function remove() {
        $vo = new DocumentoVO($_GET["id"]);
        $model = new DocumentoModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("documentos.php");
    }

}
