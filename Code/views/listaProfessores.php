<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Professores - Sistema de Estágios</title>
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
                    <th>E-mail</th>
                    <th>SIAPE</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Cidade</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Função</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor) {?> 
                    <tr>
                        <td><?php echo $professor->getId() ?></td>
                        <td>
                            <?php if ($professor->getFoto()) { ?>
                                <img src="<?php $professor->getFoto(); ?>" alt="Foto de perfil de <?php echo $professor->getNome(); ?>">
                            <?php } ?>
                        </td>
                        <td><?php echo $professor->getNome() ?></td>
                        <td><?php echo $professor->getEmail() ?></td>
                        <td><?php echo $professor->getSiape() ?></td>
                        <td><?php echo $professor->getCpf() ?></td>
                        <td><?php echo $professor->getRg() ?></td>
                        <td><?php echo $professor->getCidade() ?></td>
                        <td><?php echo $professor->getEndereco() ?></td>
                        <td><?php echo $professor->getTelefone() ?></td>
                        <td><?php echo $professor->getFuncao() ?></td>
                    </tr>
                <?php } if ($professores == []) {?>
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