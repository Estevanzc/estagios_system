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
        #insert_button {
            width: 150px;
            height: 30px;
            font-weight: bold;
            margin-right: 50px;
            align-self: flex-end;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            background-color: rgb(80,85,203);
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-family: 'Montserrat', 'Poppins', 'Arial';
        }
    </style>
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <a href="curso.php" id="insert_button">Inserir Curso</a>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Carga Horária</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function getEstudante($id, $estudantes) {
                        foreach($estudantes as $estudante) {
                            if ($estudante->getId_curso() == $id) {
                                return $estudante;
                            }
                        }
                    }
                    foreach ($cursos as $curso) {?> 
                        <tr>
                            <td><?php echo $curso->getId(); ?></td>
                            <td><?php echo $curso->getNome(); ?></td>
                            <td><?php echo $curso->getCarga_horaria(); ?></td>
                            <td><a href="curso.php?id=<?php echo($curso->getId());?>"><i class="fa-solid fa-pen"></i></a></td>
                            <?php
                            if (is_null(getEstudante($curso->getId(), $estudantes))) {
                                ?>
                                <td><a href="excluirCurso.php?id=<?php echo($curso->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
                                <?php
                            }
                            ?>
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
    </div>
    <?php require_once("includes/vlibras.php")?>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>