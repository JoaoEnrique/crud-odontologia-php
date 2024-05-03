<?php
namespace App\Controllers;
use App\Models\Agendamento;
require_once('app/models/Agendamento.php');

class AgendamentosController{
    private $agendamento;

    public function __construct(){
        $this->agendamento = new Agendamento();
    }

    public function incluir(){
        $this->agendamento->setNome($_POST['nome']);
        $this->agendamento->setDataNascimento($_POST['data_nascimento']);
        $this->agendamento->setCelular($_POST['celular']);
        $this->agendamento->setEmail($_POST['email']);
        $this->agendamento->setDataConsulta($_POST['data_consulta']);
        $this->agendamento->setHoraConsulta($_POST['hora_consulta']);
        $this->agendamento->setMotivoConsulta($_POST['motivo_consulta']);
        $result = $this->agendamento->criar();


        if($result >= 1){
            echo "<script>document.location='../../consultar.php?sucess=1&message=Registro incluído com sucesso!'</script>";
        }else{
            echo "<script>document.location='../../consultar.php?danger=1&message=Erro ao salvar!'</script>";
        }
    }

    public function listar($id){
        return $result = $this->agendamento->consultar($id);
    }

    public function editar(){
        $this->agendamento->setId($_POST['id']);
        $this->agendamento->setNome($_POST['nome']);
        $this->agendamento->setDataNascimento($_POST['data_nascimento']);
        $this->agendamento->setCelular($_POST['celular']);
        $this->agendamento->setEmail($_POST['email']);
        $this->agendamento->setDataConsulta($_POST['data_consulta']);
        $this->agendamento->setHoraConsulta($_POST['hora_consulta']);
        $this->agendamento->setMotivoConsulta($_POST['motivo_consulta']);
        $result = $this->agendamento->atualizar();
        if($result >= 1){
            echo "<script>document.location='../../consultar.php?sucess=1&message=Registro atualizado com sucesso!'</script>";
        }else{
            echo "<script>document.location='../../consultar.php?danger=1&message=Erro ao atualizar!'</script>";
        }
    }

    public function excluir($id){
        $this->agendamento->setId($id);
        $result = $this->agendamento->excluir();
        if($result >= 1){
            echo "<script>document.location='../../consultar.php?sucess=1&message=Registro excluido com sucesso!'</script>";
        }else{
            echo "<script>document.location='../../consultar.php?danger=1&message=Erro ao excluir!'</script>";
        }
    }
}

new AgendamentosController();