<?php


require_once("Connection_cfg.php");
require_once("vendor/autoload.php");

$controller = new Controller\ContratoController(true);
$controller->listOne($_GET["id_contrato"]);