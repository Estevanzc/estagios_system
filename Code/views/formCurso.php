<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Curso - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form class="form-add">
            <h2>Cadastre um curso</h2>
            <input type="hidden" name="id" value="<?php echo $curso->getId(); ?>">
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do curso" value="<?php echo $curso->getNome(); ?>">
            <br>
            <input type="number" id="carga_horaria" name="carga_horaria" placeholder="Digite a carga horária do curso" value="<?php echo ($curso->getCarga_horaria() ? $curso->getCarga_horaria() : ""); ?>">
            <br>
            <button>Cadastrar</button>
        </form>

    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>