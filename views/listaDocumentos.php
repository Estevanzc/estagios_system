<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Bancas - Sistema de Estágios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="uploads/logo-no-txt.png">
    <style>
        .container.content {
            gap: 10px 0px;
        }
        .container.content>a {
            width: 80px;
            height: 30px;
            font-weight: bold;
            margin-right: 50px;
            align-self: flex-end;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            background-color: rgb(80,85,203);
            width: 150px;
            display: flex;
            font-family: 'Montserrat', 'Poppins', 'Arial';
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <a href="documento.php">Inserir Documento</a>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nome</th>
                        <th>Contrato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($documentos as $documento) {?> 
                        <tr>
                            <td><?php echo $documento->getId(); ?></td>
                            <td><?php echo $documento->getTipo(); ?></td>
                            <td><?php echo $documento->getNome(); ?></td>
                            <td>
                                <a href="contratoInfo.php?id_contrato=<?php echo $documento->getId_contrato(); ?>">
                                    Visualizar contrato de <?php echo $documento->getNome(); ?>
                                </a>
                            </td>
                            <td><a href="excluirDocumento.php?id=<?php echo($documento->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php } if ($documentos == []) {?>
                        <tr>
                            <td colspan="3">
                                Sem cursos cadastrados...
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