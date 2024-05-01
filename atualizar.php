<?php
require "vendor/autoload.php";
use App\Controllers\AgendamentosController;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Agendamento</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <?php
        $controller = new AgendamentosController();
        $resultado = $controller->listar($_GET['id']);
    ?>

    <div class="container">
        <div class="titulos">
            <h1 id="titulo">Agendamento de Consultas Odontológica</h1>
            <p id="subtitulo">Preencha o formulário para marcar sua consulta com o(a) dentista</p>
        </div>
        <form method="post" action="Form.php?funcao=atualizar">
            <input type="hidden" name="id" id="id" value="<?php echo $resultado[0]['id']; ?>">
            <fieldset class="grupo">
                <div class="campo">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $resultado[0]['nome']; ?>" placeholder="Nome Completo" required>
                </div>
                <div class="campo">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $resultado[0]['data_nascimento']; ?>" required>
                </div>   
            </fieldset>

            <fieldset class="grupo">
                <div class="campo">
                    <label for="celular">Celular</label>
                    <input type="number" name="celular" id="celular" value="<?php echo $resultado[0]['celular']; ?>" placeholder="xxxxx-xxxx" required>
                </div>
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" name="email"  id="email" value="<?php echo $resultado[0]['email']; ?>" placeholder="***@gmail.com" required>
                </div>         
            </fieldset>

            <fieldset class="grupo2">
                <div class="campo">
                    <label for="data_consulta">Data da consulta</label>
                    <input type="date"  value="<?php echo date('Y-m-d', strtotime($resultado[0]['data_consulta'])); ?>" name="data_consulta" id="data_consulta" required>
                </div>
                <div class="campo">
                    <label for="hora_consulta">Horário da consulta</label>
                    <input type="time" value="<?php echo $resultado[0]['hora_consulta']; ?>" name="hora_consulta" id="hora_consulta" required>
                </div>
            </fieldset>
            <div class="campo">
                <label for="motivo_consulta">Motivo da consulta</label>
                <select name="motivo_consulta" id="motivo_consulta">
                    <option disabled value="">Escolha...</option>
                        <option <?php if($resultado[0]['motivo_consulta'] == "Restauração"){ echo 'selected';} ?> value="Restauração">Restauração</option>
                        <option <?php if($resultado[0]['motivo_consulta'] ==  "Canal"){ echo 'selected';} ?> value="Canal">Canal</option>
                        <option <?php if($resultado[0]['motivo_consulta'] ==  "Implante"){ echo 'selected';} ?> value="Implante">Implante</option>
                        <option <?php if($resultado[0]['motivo_consulta'] ==  "Extração"){ echo 'selected';} ?> value="Extração">Extração</option>
                        <option <?php if($resultado[0]['motivo_consulta'] ==  "Clareamento"){ echo 'selected';} ?> value="Clareamento">Clareamento</option>
                        <option <?php if($resultado[0]['motivo_consulta'] ==  "Lentes"){ echo 'selected';} ?> value="Lentes">Lentes</option>
                </select>
            </div>
        <br>

            <button type="submit" class="botao">Atualizar</button>
        <br>
        </form> 
    </div>
</body>
</html>