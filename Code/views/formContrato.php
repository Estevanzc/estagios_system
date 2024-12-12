<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar/Adicionar Contrato - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form action="salvarContrato.php" method="post" class="form-add">
            <h2>Adicione/Edite um contrato</h2>
            <label for="processo">Selecione o processo do contrato</label>
            <select name="processo" id="processo">
                <option value="1">Impresso</option>
                <option value="2">Físico</option>
                <option value="3">Digital</option>
            </select>
            
            <label for="encaminhamento">Selecione o encaminhamento do estágio</label>
            <select name="encaminhamento" id="encaminhamento">
                <option value="1" selected>Documentos faltantes</option>
                <option value="2">Documentos confirmados</option>
            </select>
            
            <input type="text" name="area" id="area" placeholder="Digite a área" value="<?php echo $contrato->getArea(); ?>">

            <label for="data_inicio">Selecione a data de início do contrato</label>
            <input type="date" name="data_inicio" id="data_inicio" value="<?php echo $contrato->getData_inicio(); ?>">
            <label for="semanal">Carga Horária Semanal (horas):</label>
            <input type="number" id="semanal" name="semanal" value="0" min="1" max="40">
            <label for="data_fim">Selecione a data de finalização do estágio</label>
            <?php
            function getEstudante($id, $estudantes) {
                foreach($estudantes as $estudante) {
                    if ($estudante->getId() == $id) {
                        return $estudante;
                    }
                }
            }
            function getCurso($id, $cursos) {
                foreach($cursos as $curso) {
                    if ($curso->getId() == $id) {
                        return $curso;
                    }
                }
            }/*
            $est = getEstudante($contrato->getId_estudante(), $estudantes);
            echo($contrato->getId_estudante());
            print_r($est);
            die;
            $cur = getCurso($est->getId_curso(), $cursos);*/
            ?>
            <span id="carga_horaria" data-carga=""></span>
            <input type="date" name="data_fim" id="data_fim" value="<?php echo $contrato->getData_fim(); ?>">
            
            <input type="number" name="media_final" id="media_final" placeholder="Digite a media final" value="<?php echo ($contrato->getMedia_final() ? $contrato->getMedia_final() : ""); ?>">

            <input type="text" name="supervisor" id="supervisor" placeholder="Digite o nome do supervisor" value="<?php echo $contrato->getSupervisor(); ?>">
            
            <input type="text" name="s_cargo" id="s_cargo" placeholder="Digite o cargo do supervisor" value="<?php echo $contrato->getS_Cargo(); ?>">
            
            <input type="text" name="s_telefone" id="s_telefone" placeholder="Digite o telefone do supervisor" value="<?php echo $contrato->getS_Telefone(); ?>">
            
            <input type="text" name="s_email" id="s_email" placeholder="Digite o e-mail do supervisor" value="<?php echo $contrato->getS_Email(); ?>">
            
            <input type="text" name="observacao" id="observacao" placeholder="Observação" value="<?php echo $contrato->getObservacao(); ?>">
            
            <label for="encerramento">Já foi encerrado?</label>
            <input type="checkbox" name="encerramento" id="encerramento" <?php echo ($contrato->getEncerramento() ? "checked" : "") ; ?>>
            
            <label for="id_empresa">Selecione a empresa</label>
            <select name="id_empresa" id="id_empresa">
                <?php 
                    foreach ($empresas as $empresa) {
                        ?>
                        <option value="<?php echo($empresa->getId());?>"><?php echo($empresa->getNome());?></option>
                        <?php
                    }
                ?>
            </select>

            <label for="id_estudante">Selecione o estudante</label>
            <select name="id_estudante" id="id_estudante" onchange="carga_horaria_btn(this)">
                <?php
                    foreach ($estudantes as $estudante) {
                        ?>
                        <option value="<?php echo($estudante->getId());?>" data-carga_horaria="<?php echo(getCurso($estudante->getId_curso(), $cursos)->getCarga_horaria())?>"><?php echo($estudante->getNome());?></option>
                        <?php
                    }
                ?>
            </select>

            <label for="id_professor">Selecione o professor</label>
            <select name="id_professor" id="id_professor">
                <?php 
                    foreach ($professores as $professor) {
                        ?>
                        <option value="<?php echo($professor->getId());?>"><?php echo($professor->getNome());?></option>
                        <?php
                    }
                ?>
            </select>

            <button type="submit">Salvar</button>
        </form>

    </div>
    <?php require_once("includes/vlibras.php")?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
    <script>
    document.getElementById('data_inicio').addEventListener('change', calculaDataFinal);
    document.getElementById('semanal').addEventListener('change', calculaDataFinal);
    var estudante_select = document.getElementById("id_estudante")

    function getId_option($value) {
        for (var i = 0; i <= estudante_select.children.length-1; i ++) {
            if (estudante_select.children[i].value == $value) {
                return i
            }
        }
    }
    function carga_horaria_btn(element) {
        console.log(getId_option(Number(element.value)));
        document.getElementById("carga_horaria").dataset.carga = element.children[getId_option(Number(element.value))].dataset.carga_horaria
        console.log(element.children[getId_option(Number(element.value))].dataset.carga_horaria);
    }
    function calculaDataFinal() {
        const dataInicioInput = document.getElementById('data_inicio');
        const cargaHorariaInput = document.getElementById('semanal');
        const dataFinalInput = document.getElementById('data_fim');
        const cargaCurso = parseInt(document.querySelector('span[data-carga]').getAttribute('data-carga'));

        if (!dataInicioInput.value || cargaHorariaInput.value === '0') {
            dataFinalInput.value = '';
            return;
        }

        const dataInicio = new Date(dataInicioInput.value);
        const cargaHorariaSemanal = parseInt(cargaHorariaInput.value);

        const dataAtual = new Date();
        dataAtual.setHours(0, 0, 0, 0);

        if (dataInicio < dataAtual) {
            alert("A data inicial deve ser maior que a data atual.");
            return;
        }

        if (cargaHorariaSemanal <= 0 || cargaHorariaSemanal > 40) {
            alert("A carga horária semanal deve ser entre 1 e 40 horas.");
            return;
        }

        const semanasNecessarias = Math.ceil(cargaCurso / cargaHorariaSemanal);
        const dataFinal = new Date(dataInicio);
        dataFinal.setDate(dataFinal.getDate() + semanasNecessarias * 7);

        const dataFinalFormatada = dataFinal.toISOString().split('T')[0];
        dataFinalInput.value = dataFinalFormatada;
    }
</script>
</body>

</html>
