<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Bancas - Sistema de Estágios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Contrato</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bancas as $banca) {?> 
                        <tr>
                            <td><?php echo $banca->getId(); ?></td>
                            <td><?php echo $banca->getNome(); ?></td>
                            <td><?php echo $banca->getEmail(); ?></td>
                            <td>
                                <a href="contratoInfo.php?id_contrato=<?php echo $banca->getId_contrato(); ?>">
                                    Visualizar contrato de <?php echo $banca->getNome(); ?>
                                </a>
                            </td>
                            <td><a href="banca.php?id=<?php echo($banca->getId());?>"><i class="fa-solid fa-pen"></i></a></td>
                            <td><a href="excluirBanca.php?id=<?php echo($banca->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
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
    </div>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>