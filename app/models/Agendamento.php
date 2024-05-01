<?php

namespace App\Models;
use App\Models\Banco;
use PDO;

class Agendamento extends Banco{
    private $id;
    private $nome;
    private $data_nascimento;
    private $celular;
    private $email;
    private $data_consulta;
    private $hora_consulta;
    private $motivo_consulta;

    public function __construct() {
        $this->conecta();
    }

    // Métodos Setter
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setDataNascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }
    public function setCelular($celular) {
        $this->celular = $celular;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setDataConsulta($data_consulta) {
        $this->data_consulta = $data_consulta;
    }
    public function setHoraConsulta($hora_consulta) {
        $this->hora_consulta = $hora_consulta;
    }
    public function setMotivoConsulta($motivo_consulta) {
        $this->motivo_consulta = $motivo_consulta;
    }

    // Métodos Getter
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getDataNascimento() {
        return $this->data_nascimento;
    }
    public function getCelular() {
        return $this->celular;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getDataConsulta() {
        return $this->data_consulta;
    }
    public function getHoraConsulta() {
        return $this->hora_consulta;
    }
    public function getMotivoConsulta() {
        return $this->motivo_consulta;
    }

    public function criar(){
        $stmt = $this->pdo->prepare("CALL AdicionarAgendamento(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->data_nascimento, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->celular, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->email, PDO::PARAM_STR);
        $stmt->bindParam(5, $this->data_consulta, PDO::PARAM_STR);
        $stmt->bindParam(6, $this->hora_consulta, PDO::PARAM_STR);
        $stmt->bindParam(7, $this->motivo_consulta, PDO::PARAM_STR);
    
        try {
            if ($stmt->execute()) {
                return json_encode(array("status" => "success", "message" => "Agendamento criado com sucesso."));
            } else {
                return json_encode(array("status" => "error", "message" => "Erro ao criar o agendamento."));
            }
        } catch (PDOException $e) {
            return json_encode(array("status" => "error", "message" => "Erro ao criar o agendamento: " . $e->getMessage()));
        }
    }

    public function atualizar(){
        $stmt = $this->pdo->prepare("CALL AtualizarAgendamento(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $this->id, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->data_nascimento, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->celular, PDO::PARAM_STR);
        $stmt->bindParam(5, $this->email, PDO::PARAM_STR);
        $stmt->bindParam(6, $this->data_consulta, PDO::PARAM_STR);
        $stmt->bindParam(7, $this->hora_consulta, PDO::PARAM_STR);
        $stmt->bindParam(8, $this->motivo_consulta, PDO::PARAM_STR);
    
        try {
            if ($stmt->execute()) {
                return json_encode(array("status" => "success", "message" => "Agendamento atualizado com sucesso."));
            } else {
                return json_encode(array("status" => "error", "message" => "Erro ao atualizar o agendamento."));
            }
        } catch (PDOException $e) {
            return json_encode(array("status" => "error", "message" => "Erro ao atualizar o agendamento: " . $e->getMessage()));
        }
    }

    public function excluir(){
        $stmt = $this->pdo->prepare("CALL ExcluirAgendamento(?)");
        $stmt->bindParam(1, $this->id, PDO::PARAM_INT);
    
        try {
            if ($stmt->execute()) {
                return json_encode(array("status" => "success", "message" => "Agendamento excluido com sucesso."));
            } else {
                return json_encode(array("status" => "error", "message" => "Erro ao excluir o agendamento."));
            }
        } catch (PDOException $e) {
            return json_encode(array("status" => "error", "message" => "Erro ao excluir o agendamento: " . $e->getMessage()));
        }
    }

    public function consultar($id){
         $this->conecta();
        if($id){
            $stmt = $this->pdo->prepare("CALL SelecionarAgendamentoId(?)");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
        }else{
            $stmt = $this->pdo->prepare("CALL SelecionarAgendamento()");
        }
    
        try {
            if ($stmt->execute()) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return json_encode(array("status" => "error", "message" => "Erro ao excluir o agendamento."));
            }
        } catch (PDOException $e) {
            return json_encode(array("status" => "error", "message" => "Erro ao excluir o agendamento: " . $e->getMessage()));
        }
    }
}