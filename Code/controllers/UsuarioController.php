<?php

namespace Controller;

use Model\UsuarioModel;
use Model\VO\UsuarioVO;

final class UsuarioController extends Controller {
    public function __construct() {
        parent::__construct();
        if ($_SESSION["usuario"]->getNivel() == 2) {
            $this->redirect("index.php");
        }
    }

    public function list() {
        $model = new UsuarioModel();
        $data = $model->selectAll(new UsuarioVO());

        $this->loadView("listaUsuarios", [
            "usuarios" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new UsuarioModel();
            $vo = new UsuarioVO($id);
            $usuario = $model->selectOne($vo);
        } else {
            $usuario = new UsuarioVO();
        }

        $this->loadView("formUsuario", [
            "usuario" => $usuario
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $vo = new UsuarioVO($id, $_POST["login"], $_POST["senha"], $_POST["nivel"]);
        $model = new UsuarioModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("usuarios.php");
    }

    public function remove() {
        $vo = new UsuarioVO($_GET["id"]);
        $model = new UsuarioModel();

        $result = $model->delete($vo);

        $this->redirect("usuarios.php");
    }

}