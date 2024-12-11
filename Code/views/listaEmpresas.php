<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Documentos - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Razão Social</th>
                    <th>E-mail</th>
                    <th>CNPJ</th>
                    <th>Representante</th>
                    <th>Função do Representante</th>
                    <th>CPF do Representanto</th>
                    <th>RG do Representante</th>
                    <th>Cidade</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Convênio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresas as $empresa) {?> 
                    <tr>
                        <td><?php echo $empresa->getId() ?></td>
                        <td>
                            <?php if ($empresa->getFoto()) { ?>
                                <img src="<?php $empresa->getFoto(); ?>" alt="Logo da Empresa <?php echo $empresa->getFoto() ?>">
                            <?php } ?>
                        </td>
                        <td><?php echo $empresa->getNome() ?></td>
                        <td><?php echo $empresa->getRazao_social() ?></td>
                        <td><?php echo $empresa->getEmail() ?></td>
                        <td><?php echo $empresa->getCnpj() ?></td>
                        <td><?php echo $empresa->getRepresentante() ?></td>
                        <td><?php echo $empresa->getR_Funcao() ?></td>
                        <td><?php echo $empresa->getR_cpf() ?></td>
                        <td><?php echo $empresa->getR_rg() ?></td>
                        <td><?php echo $empresa->getCidade() ?></td>
                        <td><?php echo $empresa->getEndereco() ?></td>
                        <td><?php echo $empresa->getTelefone() ?></td>
                        <td><?php echo $empresa->getConvenio() ?></td>
                    </tr>
                <?php } if ($empresas == []) {?>
                    <tr>
                        <td colspan="16">
                            Sem contratos cadastrados...
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>