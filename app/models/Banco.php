<?php
namespace App\Models;
use PDO;
use Dotenv\Dotenv;

class Banco{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $dsn;
    protected $pdo;
    
 
    public function __construct() {
        $this->conecta();
    }
      public function conecta() {
        try {
            // Carrega as variáveis de ambiente do arquivo .env
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); // Ajuste o caminho conforme sua estrutura de diretórios
            $dotenv->load();
            $this->host = $_ENV['DB_HOST'];
            $this->db   = $_ENV['DB_DATABASE'];
            $this->user = $_ENV['DB_USERNAME'];
            $this->pass = $_ENV['DB_PASSWORD'];
            

            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pass)or print (mysql_error());
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}