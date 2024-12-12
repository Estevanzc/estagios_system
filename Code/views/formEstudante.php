<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar/Adicionar Estudante - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form action="salvarEstudante.php" method="post" enctype="multipart/form-data" class="form-add">
            <h2>Adicione/Edite um estudante</h2>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do estudante" value="<?php echo $estudante->getNome(); ?>">
            <label for="file" class="file-input">
                Adicione a foto do estudante
            </label>
            <input type="file" name="foto" id="foto">
                        
            <input type="email" name="email" id="email" placeholder="Digite o e-mail do estudante" value="<?php echo $estudante->getEmail(); ?>">
            
            <input type="text" name="matricula" id="matricula" placeholder="Digite a matricula do estudante" value="<?php echo $estudante->getMatricula(); ?>">
            
            <input type="text" name="matricula_ativa" id="matricula_ativa" placeholder="Digite a matricula ativa do estudante" value="<?php echo $estudante->getMatricula(); ?>">
            
            <input type="text" name="ano_curso" id="ano_curso" placeholder="Digite o ano do curso do estudante" value="<?php echo $estudante->getAno_curso(); ?>">
            
            <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF do estudante" value="<?php echo $estudante->getCpf(); ?>">
            
            <input type="text" name="rg" id="rg" placeholder="Digite o RG do estudante" value="<?php echo $estudante->getRg(); ?>">
            
            <label for="data_nasc">Selecione a data de nascimento do estudante</label>
            <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $estudante->getData_nasc(); ?>">
            
            <input type="text" name="res_nome" id="res_nome" placeholder="Digite o nome do responsavel pelo estudante" value="<?php echo $estudante->getRes_nome(); ?>">
            
            <input type="text" name="res_email" id="res_email" placeholder="Digite o e-mail do responsavel pelo aluno" value="<?php echo $estudante->getRes_email(); ?>">
            
            <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade do estudante" value="<?php echo $estudante->getCidade(); ?>">
            
            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço do estudante" value="<?php echo $estudante->getEndereco(); ?>">
            
            <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone do estudante" value="<?php echo $estudante->getTelefone(); ?>">

            <label for="id_curso">Selecione o curso do estudante</label>
            <select name="id_curso" id="id_curso">
                <?php
                    foreach ($cursos as $curso) {
                        ?>
                        <option value="<?php echo $curso->getId();?>" <?php echo($curso->getId() == $estudante->getId_curso() ? "selected" : "");?>><?php echo $curso->getNome();?></option>
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
</body>

</html>