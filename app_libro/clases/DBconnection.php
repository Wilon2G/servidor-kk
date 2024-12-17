<?php
//namespace nombre;

/* recordar incluirlo en el index.php require '../vendor/autoload.php';*/
use \PDO;
use \PDOException;

class DBconnection {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $dsn;
    protected $connect;

    public function __construct() {
        $config = json_decode(file_get_contents('../databaseConfig.json'), true);
        $this->host = $config['host'];
        $this->db = $config['dbname'];
        $this->user = $config['user'];
        $this->pass = $config['pass'];
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        $this->connect = DBconnection::crearConect($config);
    }

    public function getConnect() {
        return $this->connect;
    }

    private function crearConect($config) {
        try {
            $connect = new PDO($this->dsn, $this->user, $this->pass);
        }
        catch(PDOException $e) {
            
            
            if ($e->getCode() === 1049) { // Database no existe
                $connect = new PDO("mysql:host={$this->host}", $this->user, $this->pass);
                $sqlFile = file_get_contents("../sql/.sql");
                $stm = $connect->prepare($sqlFile);
                $stm->execute();
            }
            $connect = new PDO($this->dsn, $this->user, $this->pass);
            }
       /* $tableExists = $connect->query("SELECT * FROM table"); // Comprobar si existen las tablas pero no es necesario
        if (!$tableExists) { 
            $sqlFile = file_get_contents("../sql/{$this->db}.sql");
            $stm = $connect->prepare($sqlFile);
            $stm->execute();
        }*/
        return $connect;
    }
}
?>