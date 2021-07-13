<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO{
    private $pdo;

    public function add(Usuario $u){

    }

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    public function findAll(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);
                $array[] = $u;
            }
        }
        return $array;
    }

    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            return $u;
        }else{
            return false;
        }
    }
    public function update(Usuario $u){
        
    }
    public function delete($id){
        
    }
  
}