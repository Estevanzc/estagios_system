<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Estudantes - Seção de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php require("includes/menu.php"); ?>
    
    <div class="container content">
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
                </tr>
            </thead>
            <tbody>
                <?php foreach($estudantes as $estudante) { ?>
                    <tr>
                        <td><?php echo $estudante->getId(); ?></td>
                        <td>
                            <?php if ($estudante->getFoto()) {?>
                            
                                <img src="uploads/<?php $estudante->getFoto(); ?>" alt="<?php $estudante->getNome(); ?> Profile Image">

                            <?php } ?>
                        </td>
                        <td><?php $estudante->getNome(); ?></td>
                        <td><?php $estudante->getEmail(); ?></td>
                        <td><?php $estudante->getMatricula(); ?></td>
                        <td><?php $estudante->getMatricula_ativa(); ?></td>
                        <td><?php $estudante->getAno_curso(); ?></td>
                        <td><?php $estudante->getCpf(); ?></td>
                        <td><?php $estudante->getRg(); ?></td>
                        <td><?php $estudante->getData_nasc(); ?></td>
                        <td><?php $estudante->getRes_nome(); ?></td>
                        <td><?php $estudante->getRes_email(); ?></td>
                        <td><?php $estudante->getCidade(); ?></td>
                        <td><?php $estudante->getEndereco(); ?></td>
                        <td><?php $estudante->getTelefone(); ?></td>
                        <td><?php $estudante->getId_curso(); ?></td>
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>