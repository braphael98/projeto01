<?php
include "conexao.class.php";

class Cadastro {
    private $id_cliente;
    private $nome;
    private $telefone;
    private $email;
    private $senha;
    private $corte;
    private $barbeiro;
    private $data;
    private $hora;

    public function getId_cliente(){
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getCorte(){
        return $this->corte;
    }

    public function setCorte($corte){
        $this->corte = $corte;
    }

    public function getBarbeiro(){
        return $this->barbeiro;
    }

    public function setBarbeiro($barbeiro){
        $this->barbeiro = $barbeiro;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }


    //clientes
    public function listaClientes(){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM clientes";
        try{
            $stmt= $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao listar clientes: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }

    public function inserirCliente(){
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = 'INSERT INTO clientes (nome, telefone, email, senha) values (:nome, :telefone, :email, :senha)';
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':telefone',$this->telefone);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':senha',$this->senha);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo 'Erro ao inserir cliente: '. $e->getMessage();
            return false;
        }
    }

    public function deletarCliente($id_cliente){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "DELETE FROM clientes WHERE id_cliente=:id_cliente";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_cliente',$id_cliente);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo 'Erro ao cancelar cliente: ' . $e->getMessage();
            return false;
        }
    }

    public function alterarCliente(){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "UPDATE clientes SET nome=:nome, telefone=:telefone, email=:email, senha=:senha WHERE id_cliente=:id_cliente";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_cliente',$this->id_cliente);
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':telefone',$this->telefone);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':senha',$this->senha);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo 'Erro ao alterar cliente'. $e->getMessage();
            return false;
        }
    }

    public function selectCliente($email, $senha){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM clientes WHERE email=:email AND senha=:senha";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':senha',$senha);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao listar cliente: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }

    public function selectClienteId($id_cliente){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM clientes WHERE id_cliente=:id_cliente";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_cliente',$id_cliente);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao listar cliente: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }





    //horarios
    public function inserirAgendamento(){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = 'INSERT INTO horarios (id_cliente, barbeiro, data, hora, corte) values (:id_cliente, :barbeiro, :data, :hora, :corte)';
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_cliente',$this->id_cliente);
            $stmt->bindParam(':barbeiro',$this->barbeiro);
            $stmt->bindParam(':data',$this->data);
            $stmt->bindParam(':hora',$this->hora);
            $stmt->bindParam(':corte',$this->corte);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo 'Erro ao inserir agendamento'. $e->getMessage();
            return false;
        }
    }
    
    public function cancelarAgendamento($id_cliente, $data){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "DELETE FROM horarios WHERE id_cliente=:id_cliente AND data=:data";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_cliente',$id_cliente);
            $stmt->bindParam(':data',$data);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo 'Erro ao cancelar agendamento: ' . $e->getMessage();
            return false;
        }
    }

    public function selectAgendamento($id_cliente){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM horarios WHERE id_cliente=:id_cliente ORDER BY id_cliente DESC LIMIT 1";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_cliente',$id_cliente);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao listar agendamento: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }

    public function consultarHorario($barbeiro, $data, $hora){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM clientes WHERE barbeiro=:barbeiro AND data=:data AND hora=:hora";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':barbeiro',$barbeiro);
            $stmt->bindParam(':data',$data);
            $stmt->bindParam(':hora',$hora);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao ver horarios: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }



}
