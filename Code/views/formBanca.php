<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Banca - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form action="salvarBanca.php" method="post" class="form-add">
            <h2>Cadastre uma banca</h2>
            <input type="hidden" name="id" value="<?php echo $banca->getId(); ?>">
            <input type="text" id="nome" name="nome" placeholder="Digite o nome da banca" value="<?php echo $banca->getNome(); ?>">
            <br>
            <input type="email" name="email" id="email" placeholder="Digite o e-mail da banca" value="<?php echo $banca->getEmail(); ?>">
            <br>
            <label for="id_contrato">Selecione o contrato da banca</label>
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
            <button>Cadastrar</button>
        </form>

    </div>
    <?php require_once("includes/vlibras.php")?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>