<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar/Adicionar Banca - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form action="salvarDocumento.php" method="post" class="form-add">
            <h2>Adicione/Edite um documento</h2>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do documento" value="<?php echo $documento->getNome(); ?>">
            <br>
            <label for="tipo">Selecione o tipo do documento</label>
            <select name="tipo" id="tipo">
                <option value="1">Termo de Compromisso</option>
                <option value="2">Plano de Atividades</option>
                <option value="3">Ficha de Auto-Avaliação</option>
                <option value="4">Ficha de Avaliação da Empresa</option>
                <option value="5">Relatório Final</option>
            </select>
            <br>
            <select name="id_contrato" id="id_contrato">
                <?php
                foreach ($contratos as $contrato) {
                    ?>
                    <option value="<?php echo($contrato->getId())?>"><?php echo($contrato->getId())?></option>
                    <?php
                }
                ?>
            </select>
            <br>
            <button type="submit">Salvar</button>
        </form>

    </div>
    <?php require_once("includes/vlibras.php")?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>