<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar/Adicionar Curso - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form action="salvarEmpresa.php" method="post" enctype="multipart/form-data" class="form-add">
            <h2>Adicione/Edite uma empresa</h2>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome da empresa" value="<?php echo $empresa->getNome(); ?>">
            <label for="file" class="file-input">
                Adicione a foto da empresa
            </label>
            <input type="file" name="foto" id="foto">
            
            <input type="text" id="razao_social" name="razao_social" placeholder="Digite a razão social da empresa" value="<?php echo $empresa->getRazao_social(); ?>">
            
            <input type="email" name="email" id="email" placeholder="Digite o e-mail da empresa" value="<?php echo $empresa->getEmail(); ?>">
            
            <input type="text" name="cnpj" id="cnpj" placeholder="Digite o CNPJ da empresa" value="<?php echo $empresa->getCnpj(); ?>">
            
            <input type="text" name="representante" id="representante" placeholder="Digite o nome do representate da empresa" value="<?php echo $empresa->getRepresentante(); ?>">
            
            <input type="text" name="r_funcao" id="r_funcao" placeholder="Digite a função do representante da empresa" value="<?php echo $empresa->getR_Funcao(); ?>">
            
            <input type="text" name="r_cpf" id="r_cpf" placeholder="Digite o CPF do representante da empresa" value="<?php echo $empresa->getR_cpf(); ?>">
            
            <input type="text" name="r_rg" id="r_rg" placeholder="Digite o RG do representante da empresa" value="<?php echo $empresa->getR_rg(); ?>">
            
            <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade da empresa" value="<?php echo $empresa->getCidade(); ?>">
            
            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço da empresa" value="<?php echo $empresa->getEndereco(); ?>">
            
            <input type="text" name="telefone" id="telefone" placeholder="Digite o telefone da empresa" value="<?php echo $empresa->getTelefone(); ?>">
            
            <input type="text" name="convenio" id="convenio" placeholder="Digite o convenio" value="<?php echo $empresa->getConvenio(); ?>">
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