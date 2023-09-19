<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
class Usuario
{
  protected $db;
  protected $table = "Usuarios";


  public function __construct()
  {
    $this->db = DBConexao::getConexao();
  }
  /**
   * Buscar registro único
   * @param int $id_Usuarios
   * @return Usuario|null
   */
  public function buscar($id_Usuarios)
  {
    try{

      $query = ("SELECT * FROM {$this->table} WHERE id_Usuarios = :id_Usuarios");

      $stmt = $this->db->prepare($query);  
      $stmt->bindParam(':id_Usuarios', $id_Usuarios, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }catch(PDOException $e ){
        echo 'Erro na inserção: ' . $e->getMessage();
        return null;
    }
  }   

  /**
   * Listar todos os registros da tabela usuario
   */
  public function listar()
  {
    try{

      $query = "SELECT * FROM {$this->table}";
      $stmt = $this->db->query($query);
      return $stmt->fetchAll(PDO::FETCH_OBJ);
   
  }catch(PDOException $e){
      echo 'Erro na inserção: ' . $e->getMessage();
      return null;
  }
  }

  /**
   * Cadastrar Usuário
   * @param array $dados
   * @return bool
   */
  public function cadastrar($dados)
  {
    try {
      $query = "INSERT INTO Usuarios (nome, email, senha, perfil)
        VALUES (:nome, :email, :senha, :perfil)";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':senha', $dados['senha']);
    $stmt->bindParam(':perfil', $dados['perfil']);
    $stmt->execute();
    $_SESSION['sucesso'] = "Cadastro relizado";
    
    return true;
    }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
    }
  /**
   * Editar Usuário
   * @param int $id 
   * @param array $dados
   * @return bool
   */
  public function editar($id_Usuarios, $dados)
  {
    try{
      $query = "UPDATE Usuarios SET nome = :nome, email = :email, senha = :senha, perfil = :perfil  WHERE id_Usuarios = :id_Usuarios";
      $stmt = $this->db->prepare($query);
    
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':senha', $dados['senha']);
    $stmt->bindParam(':perfil', $dados['perfil']);
    $stmt->bindParam(':id_Usuarios',$id_Usuarios, PDO::PARAM_INT);
    $stmt->execute();
    $_SESSION['sucesso'] = "Usuário editado com sucesso";
    return true;

    }catch (PDOException $e){
      echo "Erro ao editar: ".$e->getMessage();
      return false;
    }
  }

  //Excluir registro do usuário
  public function excluir($id_Usuarios)
  {

    try{
      
      $query = "DELETE FROM {$this->table} WHERE id_Usuarios = :id_Usuarios";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':id_Usuarios',$id_Usuarios, PDO::PARAM_INT);
      $stmt->execute(); 
      $_SESSION['sucesso'] = "Usuario excluido com sucesso ";

      return true;

    }catch (PDOException $e){
      echo "Erro ao deletar: ".$e->getMessage();

      return false;
    }
  }
}
