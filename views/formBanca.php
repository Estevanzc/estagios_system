<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar/Adicionar Banca - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="uploads/logo-no-txt.png">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form class="form-add">
            <input type="hidden" name="id" value="<?php echo $banca->getId(); ?>">
            <h2>Adicione/Edite uma banca</h2>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome da banca" value="<?php echo $banca->getNome(); ?>">
            <br>
            <input type="email" name="email" id="email" placeholder="Digite o e-mail da banca" value="<?php echo $banca->getEmail(); ?>">
            <br>
            <label for="contrato" class="file-input">Selecione o contrato da banca</label>
            <input type="file" name="contrato" id="contrato" placeholder="Adicionar Contrato">
            <br>
            <button>Salvar</button>
        </form>

    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>