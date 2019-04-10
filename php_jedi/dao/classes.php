<?php

class Database {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:dbname=db_blog;host=localhost", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}

class UsuarioDAO extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function get($fields = array(), $where = array()) {
        $usuario = array();
        $values = array();

        if(count($fields) == 0) {
            $fields = array("*");
        }

        $sql = "SELECT ". implode(",", $fields) ." FROM tb_usuario ";

        if(count($where) > 0) {
            $tables = array_keys($where);
            $values = array_values($where);
            $comp = array();

            foreach ($tables as $table) {
                $comp = $table. "= ?";
            }

            $sql .= implode(" AND ", $comp);
        }

        $sql = $this->db->prepare($sql);
        $sql->execute($values);

        if($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $item) {
                $usuario[] = new Usuario($item);
            }
        }

        return $usuario;
    }

    public function insert(Usuario $usuario) {
        $fields = array(
            "nome" => $usuario->getName(),
            "email" => $usuario->getEmail(),
            "senha" => $usuario->getPass()
        );

        if(count($fields) > 0) {
            $questions = array();
            for($i = 0; $i < count(array_keys($fields)); $i++) {
                $questions[] = "?";
            }

            $sql = "INSERT INTO tb_usuario(". implode(",", array_keys($fields)) .") VALUES(". implode(",", $questions) .")";
            $sql = $this->db->prepare($sql);
            $sql->execute(array_values($fields));
        } 
    }
}

class Usuario {
    private $id, $name, $email, $pass;

    public function __construct($array) {
        $this->id = (isset($array["id"])) ? $array["id"] : "";
        $this->name = (isset($array["nome"])) ? $array["nome"] : "";
        $this->email = (isset($array["email"])) ? $array["email"] : "";
        $this->pass = (isset($array["senha"])) ? $array["senha"] : "";
    }

    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getId() { return $this->id; }
    public function getPass() { return $this->pass; }
}

?>