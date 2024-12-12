<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Professores - Sistema de Estágios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="uploads/logo-no-txt.png">
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
        <div class="table-container">
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
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function getContrato($id, $contratos) {
                        foreach ($contratos as $contrato) {
                            if ($contrato->getId_professor() == $id) {
                                return $contrato;
                            }
                        }
                    }
                    foreach ($professores as $professor) {?> 
                        <tr>
                            <td><?php echo $professor->getId() ?></td>
                            <td>
                                <img style="width: 80%;" src="<?php echo(is_null($professor->getFoto()) ? "White-Duck.png" : $professor->getFoto()); ?>" alt="Foto de perfil de <?php echo $professor->getNome(); ?>">
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
                            <td><a href="professor.php?id=<?php echo($professor->getId());?>"><i class="fa-solid fa-pen"></i></a></td>
                            <?php
                            if (is_null(getContrato($professor->getId(), $contratos))) {
                                ?>
                                <td><a href="excluirProfessor.php?id=<?php echo($professor->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
                                <?php
                            }
                            ?>
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
    </div>
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>