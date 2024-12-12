<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Contratos - Sistema de Estágios</title>
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
                        <th>Processo</th>
                        <th>Encaminhamento</th>
                        <th>Área</th>
                        <th>Data de Início</th>
                        <th>Data de Finalização</th>
                        <th>Média Final</th>
                        <th>Supervisor</th>
                        <th>Cargo do Supervisor</th>
                        <th>Telefone do Supervisor</th>
                        <th>E-mail do Supervisor</th>
                        <th>Observação</th>
                        <th>Encerramento</th>
                        <th>Empresa</th>
                        <th>Estudante</th>
                        <th>Professor</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo $contratos->getId(); ?></td>
                            <td><?php echo $contratos->getProcesso(); ?></td>
                            <td><?php echo $contratos->getEncaminhamento(); ?></td>
                            <td><?php echo $contratos->getArea(); ?></td>
                            <td><?php echo $contratos->getData_inicio(); ?></td>
                            <td><?php echo $contratos->getData_fim(); ?></td>
                            <td><?php echo $contratos->getMedia_final(); ?></td>
                            <td><?php echo $contratos->getSupervisor(); ?></td>
                            <td><?php echo $contratos->getS_Cargo(); ?></td>
                            <td><?php echo $contratos->getS_Telefone(); ?></td>
                            <td><?php echo $contratos->getS_Email(); ?></td>
                            <td><?php echo $contratos->getObservacao(); ?></td>
                            <td><?php echo $contratos->getEncerramento(); ?></td>
                            <td><?php echo $contratos->getId_empresa(); ?></td>
                            <td><?php echo $contratos->getId_estudante(); ?></td>
                            <td><?php echo $contratos->getId_professor(); ?></td>
                        </tr>
                </tbody>
            </table>
        </div>



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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function getEstudante($id, $estudantes) {
                        foreach($estudantes as $estudante) {
                            if ($estudante->getId() == $id) {
                                return $estudante;
                            }
                        }
                    }
                    function getProfessor($id, $professores) {
                        foreach($professores as $professor) {
                            if ($professor->getId() == $id) {
                                return $professor;
                            }
                        }
                    }
                    function getEmpresa($id, $empresas) {
                        foreach($empresas as $empresa) {
                            if ($empresa->getId() == $id) {
                                return $empresa;
                            }
                        }
                    }
                    function getCurso($id, $cursos) {
                        foreach($cursos as $curso) {
                            if ($curso->getId() == $id) {
                                return $curso;
                            }
                        }
                    }
                    $est = getEstudante($contratos->getId_estudante(), $estudantes);
                    $pro = getProfessor($contratos->getId_professor(), $professores);
                    $emp = getEmpresa($contratos->getId_empresa(), $empresas);
                    ?>
                    <tr>
                            <td><?php echo $est->getId(); ?></td>
                            <td>
                                <?php if ($est->getFoto()) { ?>

                                    <img src="uploads/<?php $est->getFoto(); ?>"
                                        alt="<?php $est->getNome(); ?> Profile Image">

                                <?php } ?>
                            </td>
                            <td><?php echo $est->getNome(); ?></td>
                            <td><?php echo $est->getEmail(); ?></td>
                            <td><?php echo $est->getMatricula(); ?></td>
                            <td><?php echo $est->getMatricula_ativa(); ?></td>
                            <td><?php echo $est->getAno_curso(); ?></td>
                            <td><?php echo $est->getCpf(); ?></td>
                            <td><?php echo $est->getRg(); ?></td>
                            <td><?php echo $est->getData_nasc(); ?></td>
                            <td><?php echo $est->getRes_nome(); ?></td>
                            <td><?php echo $est->getRes_email(); ?></td>
                            <td><?php echo $est->getCidade(); ?></td>
                            <td><?php echo $est->getEndereco(); ?></td>
                            <td><?php echo $est->getTelefone(); ?></td>
                            <td><?php echo $est->getId_curso(); ?></td>
                        </tr>
                    <?php
                    ?>
                </tbody>
            </table>
        </div>


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
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo $pro->getId() ?></td>
                            <td>
                                <?php if ($pro->getFoto()) { ?>
                                    <img src="<?php $pro->getFoto(); ?>"
                                        alt="Foto de perfil de <?php echo $pro->getNome(); ?>">
                                <?php } ?>
                            </td>
                            <td><?php echo $pro->getNome() ?></td>
                            <td><?php echo $pro->getEmail() ?></td>
                            <td><?php echo $pro->getSiape() ?></td>
                            <td><?php echo $pro->getCpf() ?></td>
                            <td><?php echo $pro->getRg() ?></td>
                            <td><?php echo $pro->getCidade() ?></td>
                            <td><?php echo $pro->getEndereco() ?></td>
                            <td><?php echo $pro->getTelefone() ?></td>
                            <td><?php echo $pro->getFuncao() ?></td>
                        </tr>
                </tbody>
            </table>
        </div>


        <div class="table-container">
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
                <tr>
                            <td><?php echo $emp->getId() ?></td>
                            <td>
                                <?php if ($emp->getFoto()) { ?>
                                    <img src="<?php $emp->getFoto(); ?>"
                                        alt="Logo da Empresa <?php echo $emp->getFoto() ?>">
                                <?php } ?>
                            </td>
                            <td><?php echo $emp->getNome() ?></td>
                            <td><?php echo $emp->getRazao_social() ?></td>
                            <td><?php echo $emp->getEmail() ?></td>
                            <td><?php echo $emp->getCnpj() ?></td>
                            <td><?php echo $emp->getRepresentante() ?></td>
                            <td><?php echo $emp->getR_Funcao() ?></td>
                            <td><?php echo $emp->getR_cpf() ?></td>
                            <td><?php echo $emp->getR_rg() ?></td>
                            <td><?php echo $emp->getCidade() ?></td>
                            <td><?php echo $emp->getEndereco() ?></td>
                            <td><?php echo $emp->getTelefone() ?></td>
                            <td><?php echo $emp->getConvenio() ?></td>
                        </tr>
                </tbody>
            </table>
        </div>


        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <?php
                        if ($_SESSION["usuario"]->getNivel() == 4) {
                            ?>
                            <th colspan="2">Ações</th>
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bancas as $banca) { ?>
                        <tr>
                            <td><?php echo $banca->getId(); ?></td>
                            <td><?php echo $banca->getNome(); ?></td>
                            <td><?php echo $banca->getEmail(); ?></td>
                            <?php
                            if ($_SESSION["usuario"]->getNivel() == 4) {
                                ?>
                                <td><a href="banca.php?id=<?php echo($banca->getId());?>"><i class="fa-solid fa-pen"></i></a></td>
                                <td><a href="excluirBanca.php?id=<?php echo($banca->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
                                <?php
                            }
                            ?>
                        </tr>
                    <?php } ?>
                    <?php
                    if ($bancas == []) {?>
                        <tr>
                            <td colspan="16">
                                Sem bancas cadastradas...
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nome</th>
                        <?php
                        if ($_SESSION["usuario"]->getNivel() == 4) {
                            ?>
                            <th>Ações</th>
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($documentos as $documento) { ?>
                        <tr>
                            <td><?php echo $documento->getId(); ?></td>
                            <td><?php echo $documento->getTipo(); ?></td>
                            <td><?php echo $documento->getNome(); ?></td>
                            <?php
                            if ($_SESSION["usuario"]->getNivel() == 4) {
                                ?>
                                <td><a href="excluirDocumento.php?id=<?php echo($documento->getId());?>"><i class="fa-solid fa-trash"></i></a></td>
                                <?php
                            }
                            ?>
                        </tr>
                    <?php } ?>
                    <?php
                    if ($documentos == []) {?>
                        <tr>
                            <td colspan="16">
                                Sem documentos cadastrados...
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <div class="table-container">
            <!-- colar listaDocumentos -->
        </div>



    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>