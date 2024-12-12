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
                    <?php
                    $counter = 1;
                    foreach ($cursos as $curso) { ?>
                        <option value="<?php echo ($counter); ?>" <?php echo (isset($_GET["curso"]) && urldecode($_GET["curso"]) == $curso->getNome() ? "selected" : ""); ?>><?php echo ($curso->getNome()); ?></option>
                    <?php
                        $counter++;
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
                        <option value="<?php echo ($counter); ?>" <?php echo (isset($_GET["ano"]) && urldecode($_GET["ano"]) == $ano ? "selected" : ""); ?>><?php echo ($ano); ?></option>
                    <?php
                        $counter++;
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
                    foreach ($estudantes as $estudante) { ?>
                        <option value="<?php echo ($counter); ?>" <?php echo (isset($_GET["estudante"]) && urldecode($_GET["estudante"]) == $estudante->getNome() ? "selected" : ""); ?>><?php echo ($estudante->getNome()); ?></option>
                    <?php
                        $counter++;
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
                    foreach ($professores as $professor) { ?>
                        <option value="<?php echo ($counter); ?>" <?php echo (isset($_GET["professor"]) && urldecode($_GET["professor"]) == $professor->getNome() ? "selected" : ""); ?>><?php echo ($professor->getNome()); ?></option>
                    <?php
                        $counter++;
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
                    foreach ($empresas as $empresa) { ?>
                        <option value="<?php echo ($counter); ?>" <?php echo (isset($_GET["empresa"]) && urldecode($_GET["empresa"]) == $empresa->getNome() ? "selected" : ""); ?>><?php echo ($empresa->getNome()); ?></option>
                    <?php
                        $counter++;
                    }
                    ?>
                </select>
            </div>
            <div>
                <input type="checkbox" class="filter_param" onchange="filter_update(this)" name="contrato" id="contrato" <?php echo (isset($_GET["contrato"]) ? "checked" : ""); ?>>
                <label for="contrato">Contratos próximos de acabar</label>
            </div>
        </div>
        <a id="filter-apply" href="index.php?">Apply</a>
    </div>
</section>

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

    function contrato_redirect(element) {
        window.location.href = `http://localhost/estagios_system/Code/contratoInfo.php?id_contrato=${element.dataset.id_contrato}`
    }

    function filter_update(element) {
        var link = "index.php?"
        for (var i = 0; i <= filter_param.length - 1; i++) {
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