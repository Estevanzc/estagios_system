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
                <?php foreach ($contratos as $contrato) {?> 
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
                <?php } if ($contratos == []) {?>
                    <tr>
                        <td colspan="16">
                            Sem contratos cadastrados...
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <section id="second-screen"> <!--modal que abre na frente do usuário-->
        <div>
            <div><button class="window-button" onclick="window_interact(this)"><i class="fa-solid fa-xmark"></i></button></div> <!--botão que fecha a modal de filtro-->
        </div>
        <div>
            <div id="filters-list">
                <div>
                    <label for="curso">Curso</label>
                    <select class="filter_param" onchange="filter_update(this)" name="curso" id="curso">
                        <option value="-1">Não selecionado</option>
                    </select>
                </div>
                <div>
                    <label for="ano">Ano de Início</label>
                    <select class="filter_param" onchange="filter_update(this)" name="ano" id="ano">
                        <option value="-1">Não selecionado</option>
                    </select>
                </div>
                <div>
                    <label for="estudante">Nome Estudante</label>
                    <select class="filter_param" onchange="filter_update(this)" name="estudante" id="estudante">
                        <option value="-1">Não selecionado</option>
                    </select>
                </div>
                <div>
                    <label for="professor">Nome Professor</label>
                    <select class="filter_param" onchange="filter_update(this)" name="professor" id="professor">
                        <option value="-1">Não selecionado</option>
                    </select>
                </div>
                <div>
                    <label for="empresa">Nome Empresa</label>
                    <select class="filter_param" onchange="filter_update(this)" name="empresa" id="empresa">
                        <option value="-1">Não selecionado</option>
                    </select>
                </div>
                <div>
                    <label for="cidade">Nome Cidade</label>
                    <input type="text" class="filter_param" onchange="filter_update(this)" id="cidade" name="cidade">
                </div>
                <div>
                    <input type="checkbox" class="filter_param" onchange="filter_update(this)" name="contrato" id="contrato">
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
                if (filter_param[i].tagName == "SELECT" && Number(filter_param[i].value) != -1 || filter_param[i].type == "text" && filter_param[i].value != "") {
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=${encodeURIComponent(filter_param[i].value)}`
                } else if (filter_param[i].type == "checkbox" && filter_param[i].checked == true) {
                    //console.log(`${filter_param[i].id}=${filter_param[i].checked}`);
                    link += (link != "index.php?" ? "&" : "") + `${filter_param[i].id}=1`
                    //console.log(1);
                    
                }
            }
            //console.log(link);
        }
    </script>
</body>
</html>