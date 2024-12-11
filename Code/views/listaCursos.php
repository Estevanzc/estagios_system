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
                    <th>Carga Horária</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $curso) {?> 
                    <tr>
                        <td><?php echo $curso->getId(); ?></td>
                        <td><?php echo $curso->getNome(); ?></td>
                        <td><?php echo $curso->getCarga_horaria(); ?></td>
                    </tr>
                <?php } if ($cursos == []) {?>
                    <tr>
                        <td colspan="3">
                            Sem cursos cadastrados...
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