<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Bancas - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Contrato</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bancas as $banca) {?> 
                    <tr>
                        <td><?php echo $banca->getId(); ?></td>
                        <td><?php echo $banca->getNome(); ?></td>
                        <td><?php echo $banca->getEmail(); ?></td>
                        <td>
                            <a href="uploads/<?php echo $banca->getId_contrato(); ?>">
                                Visualizar contrato de <?php echo $banca->getNome(); ?>
                            </a>
                        </td>
                    </tr>
                <?php } if ($bancas == []) {?>
                    <tr>
                        <td colspan="4">
                            Sem bancas cadastradas...
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