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

    <div class="container">
        <div class="titulos">
            <h1 id="titulo">Agendamento de Consultas Odontológica</h1>
            <p id="subtitulo">Preencha o formulário para marcar sua consulta com o(a) dentista</p>
        </div>
        <form action="Form.php?funcao=cadastro" method="post">
            <input type="hidden" name="funcao" value="cadastro">
                <div class="campo">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
                </div>
                <div class="campo">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required>
                </div>

            <fieldset class="grupo">
                <div class="campo">
                    <label for="celular">Celular</label>
                    <input type="number" name="celular" id="celular" placeholder="xxxxx-xxxx" required>
                </div>
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" name="email"  id="email" placeholder="***@gmail.com" required>
                </div>         
            </fieldset>

            <fieldset class="grupo2">
                <div class="campo">
                    <label for="data_consulta">Data da consulta</label>
                    <input type="date" name="data_consulta" id="data_consulta" required>
                </div>
                <div class="campo">
                    <label for="hora_consulta">Horário da consulta</label>
                    <input type="time" name="hora_consulta" id="hora_consulta" required>
                </div>
            </fieldset>
                
            <div class="campo">
                <label for="motivo_consulta">Motivo da consulta</label>
                <select name="motivo_consulta" id="motivo_consulta">
                    <option selected disabled value="">Escolha...</option>
                        <option value="Restauração">Restauração</option>
                        <option value="Canal">Canal</option>
                        <option value="Implante">Implante</option>
                        <option value="Extração">Extração</option>
                        <option value="Clareamento">Clareamento</option>
                        <option value="Lentes">Lentes</option>
                </select>
            </div>
        <br>

            <button type="submit" class="botao">Agendar</button>
        <br>
        </form> 
    </div>
</body>
</html>