<?php

namespace Controller;

use Model\BancaModel;
use Model\ContratoModel;
use Model\VO\BancaVO;
use Model\VO\ContratoVO;

final class BancaController extends Controller {

    public function list() {
        $model = new BancaModel();
        $data = $model->selectAll(new BancaVO());

        $this->loadView("listaBancas", [
            "bancas" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new BancaModel();
            $vo = new BancaVO($id);
            $banca = $model->selectOne($vo);
        } else {
            $banca = new BancaVO();
        }

        $contratos = (new ContratoModel())->selectAll(new ContratoVO());
        $this->loadView("formBanca", [
            "banca" => $banca,
            "contratos" => $contratos
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new BancaModel();
        $vo = new BancaVO($id, $_POST["nome"], $_POST["email"], (int) $_POST["id_contrato"]);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("bancas.php");
    }

    public function remove() {
        $vo = new BancaVO($_GET["id"]);
        $model = new BancaModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("bancas.php");
    }

}