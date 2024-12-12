<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Contratos - Sistema de Estágios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="uploads/logo-no-txt.png">
    <style>
        #second-screen {
            position: absolute;
            width: 50%;
            height: 50%;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: none;
            justify-content: center;
            align-items: center;
            flex-flow: column;
            font-family: monospace;
            backdrop-filter: blur(5px);
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
            background-color: rgba(255,255,255,0.8);
            z-index: 1;
        }
        #second-screen>*:nth-child(1) {
            width: 100%;
            height: 15%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        #second-screen>*:nth-child(1)>* {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(80,85,203);
            border: none;
            cursor: pointer;
            font-size: 12pt;
            border-radius: 100%;
            margin-right: 10px;
            transition: all 0.25s ease;
            color: white;
        }
        #second-screen>*:nth-child(1)>*:hover {
            box-shadow: 1px 1px 5px black;
            background-color: red;
        }
        #second-screen>*:nth-child(2) {
            width: 100%;
            height: 85%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
            gap: 20px 0px;
        }
        #filters-list {
            width: 100%;
            height: 80%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-flow: column wrap;
            gap: 20px 0px;
        }
        #filters-list select {
            width: 85%;
            height: 30px;
            border-radius: 5px;
            border: none;
            box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
            background-color: rgba(255,255,255,0.8);
            padding: 0px 10px;
            cursor: pointer;
        }
        #filters-list label {
            cursor: pointer;
            font-size: 11pt;
        }
        #filters-list>* {
            width: 50%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-flow: column;
            margin-left: 15px;
            font-weight: bold;
            gap: 5px 10px;
        }
        #filters-list>*:nth-child(6) {
            flex-flow: row;
        }
        #filter-apply {
            padding: 5px 20px;
            text-decoration: none;
            font-weight: bold;
            color: black;
            cursor: pointer;
            transition: all 0.25s ease;
            border-radius: 2.5px;
            background-color: rgb(80,85,203);
            color: white;
        }
        #filter-apply:hover {
            box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
        }
        .window-button:nth-child(1), #insert_button {
            width: 80px;
            height: 30px;
            font-weight: bold;
            margin-right: 50px;
            align-self: flex-end;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            background-color: rgb(80,85,203);
        }
        #insert_button {
            width: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-family: 'Montserrat', 'Poppins', 'Arial';
        }
        .container.content {
            gap: 10px 0px;
        }
    </style>
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <button class="window-button" onclick="window_interact(this)">Filtros</button> <!--botão que abre a modal de filtro-->
        <a href="contrato.php" id="insert_button">Inserir Contrato</a>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Processo</th>
                        <th>Encaminhamento</th>
                        <th>Área</th>
                        <th>Data de Início</th>
                        <th>Data de Finalização</th>
                        <th>Média Final</th>
                        <th>Supervisor</th>
                        <th>Cargo do Supervisor</th>
                        <th>Telefone do Supervisor</th>
                        <th>E-mail do Supervisor</th>
                        <th>Observação</th>
                        <th>Encerramento</th>
                        <th>Empresa</th>
                        <th>Estudante</th>
                        <th>Professor</th>
                        <?php
                        if ($_SESSION["usuario"]->getNivel() == 4) {
                            ?>
                            <th colspan="2">Ações</th>
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function getEstudante($id, $estudantes) {
                        foreach($estudantes as $estudante) {
                            if ($estudante->getId() == $id) {
                                return $estudante;
                            }
                        }
                    }
                    function getProfessor($id, $professores) {
                        foreach($professores as $professor) {
                            if ($professor->getId() == $id) {
                                return $professor;
                            }
                        }
                    }
                    function getEmpresa($id, $empresas) {
                        foreach($empresas as $empresa) {
                            if ($empresa->getId() == $id) {
                                return $empresa;
                            }
                        }
                    }
                    function getCurso($id, $cursos) {
                        foreach($cursos as $curso) {
                            if ($curso->getId() == $id) {
                                return $curso;
                            }
                        }
                    }
                    function getDocumento($id, $documentos) {
                        foreach($documentos as $documento) {
                            if ($documento->getId_contrato() == $id) {
                                return $documento;
                            }
                        }
                    }
                    foreach ($contratos as $contrato) {
                        if ($_SESSION["usuario"]->getNivel() == 4) {
                            $contrato_allow = true;
                            $est = getEstudante($contrato->getId_estudante(), $estudantes);
                            $cur = getCurso($est->getId_curso(), $cursos);
                            $emp = getEmpresa($contrato->getId_empresa(), $empresas);
                            $pro = getProfessor($contrato->getId_professor(), $professores);
                            $initDate = new DateTime(date("Y-m-d"));
                            $endDate = new DateTime($contrato->getData_fim());
                            //echo(isset($_GET["ano"]) && $contrato->getData_inicio() != $_GET["ano"]);
                            //echo(isset($_GET["curso"]) && $cur->getNome() != urldecode($_GET["curso"]));
                            //echo($cur->getNome() == urldecode($_GET["curso"]) ? "2": "");
                            //echo($contrato_allow ? 1 : 2);
                            if (isset($_GET["curso"]) && $cur->getNome() != urldecode($_GET["curso"])) {
                                //echo(1);
                                $contrato_allow = false;
                            }
                            if (isset($_GET["ano"]) && substr($contrato->getData_inicio(), 0, 4) != $_GET["ano"]) {
                                $contrato_allow = false;
                            }
                            if (isset($_GET["estudante"]) && $est->getNome() != urldecode($_GET["estudante"])) {
                                //echo(3);
                                $contrato_allow = false;
                            }
                            if (isset($_GET["professor"]) && $pro->getNome() != urldecode($_GET["professor"])) {
                                //echo(4);
                                $contrato_allow = false;
                            }
                            if (isset($_GET["empresa"]) && $emp->getNome() != urldecode($_GET["empresa"])) {
                                //echo(5);
                                $contrato_allow = false;
                            }
                            if (isset($_GET["contrato"]) && (int) $initDate->diff($endDate)->days > 14 && (int) substr($contrato->getData_fim(), 0, 4) >= (int) date("Y")) {
                                //echo(6);
                                $contrato_allow = false;
                            }
                            //echo($contrato_allow ? 1 : 2);
                            if ($contrato_allow) {
                                ?>
                                    <tr onclick="contrato_redirect(this)" data-id_contrato="<?php echo($contrato->getId())?>">
                                        <td><?php echo $contrato->getId(); ?></td>
                                        <td><?php echo $contrato->getProcesso(); ?></td>
                                        <td><?php echo $contrato->getEncaminhamento(); ?></td>
                                        <td><?php echo $contrato->getArea(); ?></td>
                                        <td><?php echo $contrato->getData_inicio(); ?></td>
                                        <td><?php echo $contrato->getData_fim(); ?></td>
                                        <td><?php echo $contrato->getMedia_final(); ?></td>
                                        <td><?php echo $contrato->getSupervisor(); ?></td>
                                        <td><?php echo $contrato->getS_Cargo(); ?></td>
                                        <td><?php echo $contrato->getS_Telefone(); ?></td>
                                        <td><?php echo $contrato->getS_Email(); ?></td>
                                        <td><?php echo $contrato->getObservacao(); ?></td>
                                        <td><?php echo $contrato->getEncerramento(); ?></td>
                                        <td><?php echo $emp->getNome(); ?></td>
                                        <td><?php echo $est->getNome(); ?></td>
                                        <td><?php echo $pro->getNome(); ?></td>
                                        <td><a href="contrato.php?id=<?php echo($contrato->getId());?>"><i class="fa-solid fa-pen"></i></a></td>
                                        <?php
                                        if (is_null(getDocumento($contrato->getId(), $documentos))) {
                                            ?>
                                            <td><a href="excluirContrato.php?id=<?php echo($contrato->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                <?php
                            }
                        } else if ($_SESSION["usuario"]->getNivel() != 4) {
                            ?>
                                <tr onclick="contrato_redirect(this)" data-id_contrato="<?php echo($contrato->getId())?>">
                                    <td><?php echo $contrato->getId(); ?></td>
                                    <td><?php echo $contrato->getProcesso(); ?></td>
                                    <td><?php echo $contrato->getEncaminhamento(); ?></td>
                                    <td><?php echo $contrato->getArea(); ?></td>
                                    <td><?php echo $contrato->getData_inicio(); ?></td>
                                    <td><?php echo $contrato->getData_fim(); ?></td>
                                    <td><?php echo $contrato->getMedia_final(); ?></td>
                                    <td><?php echo $contrato->getSupervisor(); ?></td>
                                    <td><?php echo $contrato->getS_Cargo(); ?></td>
                                    <td><?php echo $contrato->getS_Telefone(); ?></td>
                                    <td><?php echo $contrato->getS_Email(); ?></td>
                                    <td><?php echo $contrato->getObservacao(); ?></td>
                                    <td><?php echo $contrato->getEncerramento(); ?></td>
                                    <td><?php echo $emp->getNome(); ?></td>
                                    <td><?php echo $est->getNome(); ?></td>
                                    <td><?php echo $pro->getNome(); ?></td>
                                </tr>
                            <?php
                        }
                    }
                    if ($contratos == []) {?>
                        <tr>
                            <td colspan="16">
                                Sem contratos cadastrados...
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <section id="second-screen"> <!--modal que abre na frente do usuário-->
        <div>
            <button class="window-button" onclick="window_interact(this)"><i class="fa-solid fa-xmark"></i></button> <!--botão que fecha a modal de filtro-->
        </div>
        <div>
            <div id="filters-list">
                <div>
                    <label for="curso">Curso</label>
                    <select class="filter_param" onchange="filter_update(this)" name="curso" id="curso">
                        <option value="-1">Não selecionado</option>
                        <?php
                        $counter = 1;
                        foreach ($cursos as $curso) {?>
                        <option value="<?php echo($counter);?>" <?php echo(isset($_GET["curso"]) && urldecode($_GET["curso"]) == $curso->getNome() ? "selected" : "");?>><?php echo($curso->getNome());?></option>
                        <?php
                        $counter ++;
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="ano">Ano de Início</label>
                    <select class="filter_param" onchange="filter_update(this)" name="ano" id="ano">
                        <option value="-1">Não selecionado</option>
                        <?php
                        $counter = 1;
                        $ano_list = [];
                        foreach ($contratos as $contrato) {
                            $contrato_ano = substr($contrato->getData_inicio(), 0, 4);
                            if (!in_array($contrato_ano, $ano_list)) {
                                $ano_list[] = $contrato_ano;
                            }
                        }
                        foreach ($ano_list as $ano) {
                            ?>
                            <option value="<?php echo($counter);?>" <?php echo(isset($_GET["ano"]) && urldecode($_GET["ano"]) == $ano ? "selected" : "");?>><?php echo($ano);?></option>
                            <?php
                            $counter ++;
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="estudante">Nome Estudante</label>
                    <select class="filter_param" onchange="filter_update(this)" name="estudante" id="estudante">
                        <option value="-1">Não selecionado</option>
                        <?php
                        $counter = 1;
                        foreach ($estudantes as $estudante) {?>
                        <option value="<?php echo($counter);?>" <?php echo(isset($_GET["estudante"]) && urldecode($_GET["estudante"]) == $estudante->getNome() ? "selected" : "");?>><?php echo($estudante->getNome());?></option>
                        <?php
                        $counter ++;
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="professor">Nome Professor</label>
                    <select class="filter_param" onchange="filter_update(this)" name="professor" id="professor">
                        <option value="-1">Não selecionado</option>
                        <?php
                        $counter = 1;
                        foreach ($professores as $professor) {?>
                        <option value="<?php echo($counter);?>" <?php echo(isset($_GET["professor"]) && urldecode($_GET["professor"]) == $professor->getNome() ? "selected" : "");?>><?php echo($professor->getNome());?></option>
                        <?php
                        $counter ++;
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="empresa">Nome Empresa</label>
                    <select class="filter_param" onchange="filter_update(this)" name="empresa" id="empresa">
                        <option value="-1">Não selecionado</option>
                        <?php
                        $counter = 1;
                        foreach ($empresas as $empresa) {?>
                        <option value="<?php echo($counter);?>" <?php echo(isset($_GET["empresa"]) && urldecode($_GET["empresa"]) == $empresa->getNome() ? "selected" : "");?>><?php echo($empresa->getNome());?></option>
                        <?php
                        $counter ++;
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input type="checkbox" class="filter_param" onchange="filter_update(this)" name="contrato" id="contrato" <?php echo(isset($_GET["contrato"]) ? "checked" : "");?>>
                    <label for="contrato">Contratos próximos de acabar</label>
                </div>
            </div>
            <a id="filter-apply" href="index.php?">Apply</a>
        </div>
    </section>
    <?php require_once("includes/vlibras.php")?>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
    <script>
        var filter_param = document.getElementsByClassName("filter_param")
        var filter_apply = document.getElementById("filter-apply")
        var second_screen = document.getElementById("second-screen")
        var window_setter = false
        function window_interact(element) {
            if (window_setter) {
                second_screen.style.display = "none"
                window_setter = false
            } else {
                second_screen.style.display = "flex"
                window_setter = true
            }
        }
        function contrato_redirect(element) {
            window.location.href = `http://localhost/estagios_system/Code/contratoInfo.php?id_contrato=${element.dataset.id_contrato}`
        }
        function filter_update(element) {
            var link = "index.php?"
            for (var i = 0; i <= filter_param.length-1; i ++) {
                if (filter_param[i].tagName == "SELECT" && Number(filter_param[i].value) != -1) {
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=${encodeURIComponent(filter_param[i].children[Number(filter_param[i].value)].innerHTML)}`
                } else if (filter_param[i].type == "checkbox" && filter_param[i].checked == true) {
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=1`
                    
                } else if (filter_param[i].type == "text" && filter_param[i].value != "") {
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=${encodeURIComponent(filter_param[i].value)}`
                    
                }
            }
            filter_apply.setAttribute("href", link)
        }
    </script>
</body>
</html>