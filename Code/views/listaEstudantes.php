<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Estudantes - Seção de Estágios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="uploads/logo-no-txt.png">
</head>
<body>
    <?php require("includes/menu.php"); ?>
    
    <div class="container content">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Matricula</th>
                        <th>Matricula Ativa</th>
                        <th>Ano do Curso</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Data de Nascimento</th>
                        <th>Nome do Responsável</th>
                        <th>E-mail do Responsável</th>
                        <th>Cidade</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Curso</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function getCurso($id, $cursos) {
                        foreach ($cursos as $curso) {
                            if ($curso->getId() == $id) {
                                return $curso;
                            }
                        }
                    }
                    function getContrato($id, $contratos) {
                        foreach ($contratos as $contrato) {
                            if ($contrato->getId_estudante() == $id) {
                                return $contrato;
                            }
                        }
                    }
                    foreach($estudantes as $estudante) { ?>
                        <tr>
                            <td><?php echo $estudante->getId(); ?></td>
                            <td>
                                <img style="width: 80%;" src="uploads/<?php echo(is_null($estudante->getFoto()) ? "White-Duck.png" : $estudante->getFoto());?>" alt="<?php $estudante->getNome(); ?> Profile Image">
                            </td>
                            <td><?php echo $estudante->getNome(); ?></td>
                            <td><?php echo $estudante->getEmail(); ?></td>
                            <td><?php echo $estudante->getMatricula(); ?></td>
                            <td><?php echo $estudante->getMatricula_ativa(); ?></td>
                            <td><?php echo $estudante->getAno_curso(); ?></td>
                            <td><?php echo $estudante->getCpf(); ?></td>
                            <td><?php echo $estudante->getRg(); ?></td>
                            <td><?php echo $estudante->getData_nasc(); ?></td>
                            <td><?php echo $estudante->getRes_nome(); ?></td>
                            <td><?php echo $estudante->getRes_email(); ?></td>
                            <td><?php echo $estudante->getCidade(); ?></td>
                            <td><?php echo $estudante->getEndereco(); ?></td>
                            <td><?php echo $estudante->getTelefone(); ?></td>
                            <td><?php echo getCurso($estudante->getId_curso(), $cursos)->getNome(); ?></td>
                            <td><a href="estudante.php?id=<?php echo($estudante->getId());?>"><i class="fa-solid fa-pen"></i></a></td>
                            <?php
                            if (is_null(getContrato($estudante->getId(), $contratos))) {
                                ?>
                                <td><a href="excluirEstudante.php?id=<?php echo($estudante->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
                                <?php
                            }
                            ?>
                        </tr>
                    <?php } if ($estudantes == []) {?>
                        <tr>
                            <td colspan="16">
                                Sem estudantes cadastrados...
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