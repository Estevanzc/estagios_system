<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Professores - Sistema de Estágios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="uploads/logo-no-txt.png">
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <form action="salvarProfessor.php" method="post" enctype="multipart/form-data" class="form-add">
            <h2>Cadastre/Edite um Professor:</h2>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do professor" value="<?php echo $professor->getNome() ?>">
            <br>
            <input type="text" id="email" name="email" placeholder="Digite o email do professor" value="<?php echo $professor->getEmail() ?>">
            <br>
            <input type="text" id="siape" name="siape" placeholder="Digite o siape do professor" value="<?php echo $professor->getSiape() ?>">
            <br>
            <input type="text" id="cpf" name="cpf" placeholder="Digite o cpf do professor" value="<?php echo $professor->getCpf() ?>">
            <br>
            <input type="text" id="rg" name="rg" placeholder="Digite o rg do professor" value="<?php echo $professor->getRg() ?>">
            <br>
            <input type="text" id="cidade" name="cidade" placeholder="Digite o cidade do professor" value="<?php echo $professor->getCidade() ?>">
            <br>
            <input type="text" id="endereco" name="endereco" placeholder="Digite o endereco do professor" value="<?php echo $professor->getEndereco() ?>">
            <br>
            <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone do professor" value="<?php echo $professor->getTelefone() ?>">
            <br>
            <input type="file" name="foto" id="foto">
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
