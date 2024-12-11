<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Contratos - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <button class="window-button" onclick="window_interact(this)">Filtros</button> <!--botão que abre a modal de filtro-->
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
                                <tr>
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
                                    <td><?php echo $contrato->getId_empresa(); ?></td>
                                    <td><?php echo $contrato->getId_estudante(); ?></td>
                                    <td><?php echo $contrato->getId_professor(); ?></td>
                                </tr>
                            <?php
                        }
                    } else if ($_SESSION["usuario"]->getNivel() != 4) {
                        ?>
                            <tr>
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
                                <td><?php echo $contrato->getId_empresa(); ?></td>
                                <td><?php echo $contrato->getId_estudante(); ?></td>
                                <td><?php echo $contrato->getId_professor(); ?></td>
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
    <section id="second-screen" style="display: none;"> <!--modal que abre na frente do usuário-->
        <div>
            <div><button class="window-button" onclick="window_interact(this)"><i class="fa-solid fa-xmark"></i></button></div> <!--botão que fecha a modal de filtro-->
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
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
    <script>
        var filter_param = document.getElementsByClassName("filter_param")
        var filter_apply = document.getElementById("filter-apply")
        var window_setter = false
        function window_interact(element) {
            if (window_setter) {
                //css para fechar a modal
                window_setter = false
            } else {
                //css para abrir a modal
                window_setter = true
            }
        }
        function filter_update(element) {
            var link = "index.php?"
            for (var i = 0; i <= filter_param.length-1; i ++) {
                if (filter_param[i].tagName == "SELECT" && Number(filter_param[i].value) != -1) {
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=${encodeURIComponent(filter_param[i].children[Number(filter_param[i].value)].innerHTML)}`
                } else if (filter_param[i].type == "checkbox" && filter_param[i].checked == true) {
                    //console.log(`${filter_param[i].id}=${filter_param[i].checked}`);
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=1`
                    //console.log(1);
                    
                } else if (filter_param[i].type == "text" && filter_param[i].value != "") {
                    //console.log(`${filter_param[i].id}=${filter_param[i].checked}`);
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=${encodeURIComponent(filter_param[i].value)}`
                    //console.log(1);
                    
                }
            }
            filter_apply.setAttribute("href", link)
        }
    </script>
</body>
</html>