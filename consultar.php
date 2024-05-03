<?php
require __DIR__.'/vendor/autoload.php';
use App\Controllers\AgendamentosController;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Consultas</title>
    <script>
		function confirmDelete(delUrl) {
  			if (confirm("Deseja apagar o registro?")) {
   				document.location = delUrl;
        }  
		}
	</script>
</head>
<body>
  <?php include "menu.php"; ?>

  <?php if(isset($_GET['sucess'])){ ?>
    <div class="alert alert-success">
        <?php echo $_GET['message']; ?>
        <a class="btn-fechar" href="consultar.php">X</a>
    </div>
  <?php }if(isset($_GET['danger'])){ ?>
    <div class="alert alert-danger">
        <?php echo $_GET['message']; ?>
        <a class="btn-fechar" href="consultar.php">X</a>
    </div>
  <?php }?>

  <div class="titulos">
      <h1 id="titulo">Agendamento de Consultas Odontológica</h1>
  </div>

  <br>
  <div>
    <?php
        $controller = new AgendamentosController();
        $resultado = $controller->listar(0);
        
    ?>
    <table class = table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Nascimento</th>
          <th>Celular</th>
          <th>Email</th>
          <th>Dia</th>
          <th>Horario</th>
          <th>Motivo</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id=TableData>
        <?php
            $controller = new AgendamentosController();
            $resultado = $controller->listar(0);

            for($i=0; $i<count($resultado); $i++){
        ?>
          <tr>
            <td scope="col"><?php echo $resultado[$i]['nome'];?></td>
            <td scope="col"><?php echo $resultado[$i]['data_nascimento'];?></td>
            <td scope="col"><?php echo $resultado[$i]['celular'];?></td>
            <td scope="col"><?php echo $resultado[$i]['email'];?></td>
            <td scope="col"><?php echo $resultado[$i]['data_consulta'];?></td>
            <td scope="col"><?php echo $resultado[$i]['hora_consulta'];?></td>
            <td scope="col"><?php echo $resultado[$i]['motivo_consulta'];?></td>
            <td>
              <a href="atualizar.php?id=<?php echo $resultado[$i]['id']; ?>"><img class="icon" src="./img/editar.png" alt=""/></a>
              <a style="cursor: pointer" onclick="javascript:confirmDelete('Form.php?funcao=excluir&id=<?php echo $resultado[$i]['id']; ?>')"><img class="icon" src="./img/excluir.png" alt=""/></a>  
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>