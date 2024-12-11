<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Contratos - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <?php require("includes/menu.php") ?>

    <div class="container content">
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
                <?php foreach ($contratos as $contrato) {?> 
                    <tr>
                        <td><?php echo $contrato->getId(); ?></td>
                        <td><?php echo $contrato->getProcesso(); ?></td>
                        <td><?php echo $contrato->getEncaminhamento(); ?></td>
                        <td><?php echo $contrato->getArea(); ?></td>
                        <td><?php echo $contrato->getData_inicio(); ?></td>
                        <td><?php echo $contrato->getData_fim(); ?></td>
                        <td><?php echo $contrato->getMedia_final(); ?></td>
                        <td><?php echo $contrato->getSupervisor(); ?></td>
                        <td><?php echo $contrato->getS_Cargo(); ?></td>
                        <td><?php echo $contrato->getS_Telefone(); ?></td>
                        <td><?php echo $contrato->getS_Email(); ?></td>
                        <td><?php echo $contrato->getObservacao(); ?></td>
                        <td><?php echo $contrato->getEncerramento(); ?></td>
                        <td><?php echo $contrato->getId_empresa(); ?></td>
                        <td><?php echo $contrato->getId_estudante(); ?></td>
                        <td><?php echo $contrato->getId_professor(); ?></td>
                    </tr>
                <?php } if ($contratos == []) {?>
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