<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar/Adicionar Contrato - Sistema de Estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require("includes/menu.php") ?>

    <div class="container content">

        <form class="form-add">
            <h2>Adicione/Edite um contrato</h2>
            <label for="processo">Selecione o processo do contrato</label>
            <select name="processo" id="processo">
                <option value="1">Impresso</option>
                <option value="2">Físico</option>
                <option value="3">Digital</option>
            </select>
            
            <label for="encaminhamento">Selecione o encaminhamento do estágio</label>
            <select name="encaminhamento" id="encaminhamento">
                <option value="1" selected>Documentos faltantes</option>
                <option value="2">Documentos confirmados</option>
            </select>
            
            <input type="text" name="area" id="area" placeholder="Digite a área" value="<?php echo $contrato->getArea(); ?>">

            <label for="data_inicio">Selecione a data de início do contrato</label>
            <input type="date" name="data_inicio" id="data_inicio" value="<?php echo $contrato->getData_inicio(); ?>">
            
            <label for="data_fim">Selecione a data de finalização do estágio</label>
            <input type="date" name="data_fim" id="data_fim" value="<?php echo $contrato->getData_fim(); ?>">
            
            <input type="number" name="media_final" id="media_final" placeholder="Digite a media final" value="<?php echo ($contrato->getMedia_final() ? $contrato->getMedia_final() : ""); ?>">

            <input type="text" name="supervisor" id="supervisor" placeholder="Digite o nome do supervisor" value="<?php echo $contrato->getSupervisor(); ?>">
            
            <input type="text" name="s_cargo" id="s_cargo" placeholder="Digite o cargo do supervisor" value="<?php echo $contrato->getS_Cargo(); ?>">
            
            <input type="text" name="s_telefone" id="s_telefone" placeholder="Digite o telefone do supervisor" value="<?php echo $contrato->getS_Telefone(); ?>">
            
            <input type="text" name="s_email" id="s_email" placeholder="Digite o e-mail do supervisor" value="<?php echo $contrato->getS_Email(); ?>">
            
            <input type="text" name="observacao" id="observacao" placeholder="Observação" value="<?php echo $contrato->getObservacao(); ?>">
            
            <label for="encerramento">Já foi encerrado?</label>
            <input type="checkbox" name="encerramento" id="encerramento" <?php echo ($contrato->getEncerramento() ? "checked" : "") ; ?>>
            
            <label for="empresa">Selecione a empresa</label>
            <select name="empresa" id="empresa">
                <?php 
                    /* options */
                ?>
            </select>

            <label for="estudante">Selecione o estudante</label>
            <select name="estudante" id="estudante">
                <?php 
                    /* options */
                ?>
            </select>

            <label for="professor">Selecione o professor</label>
            <select name="professor" id="professor">
                <?php 
                    /* options */
                ?>
            </select>

            <button type="submit">Salvar</button>
        </form>

    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>
