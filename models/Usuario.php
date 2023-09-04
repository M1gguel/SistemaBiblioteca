<?php
class Usuario
{
  protected $db;
  protected $table = "usuarios";

  public function __construct()
  {
    $this->db = DBConexao::getConexao();
  }
  /**
   * Buscar registro único
   * @param int $id
   * @return Usuario
   */
  public function buscar($id)
  {
    
  }

  /**
   * Listar todos os registros da tabela usuario
   */
  public function listar()
  {
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
    } catch (PDOException $e) {
      echo "Erro na preparação da consulta: " . $e->getMessage();
    }
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':senha', $dados['senha']);
    $stmt->bindParam(':perfil', $dados['perfil']);

    try {
      $stmt->execute();
      echo "Inserção bem-sucedida!";
    } catch (PDOException $e) {
      echo "Erro na inserção: " . $e->getMessage();
    }
  }

  /**
   * Editar Usuário
   * @param int $id 
   * @param array $dados
   * @return bool
   */
  public function editar($id, $dados)
  {
    try{
      $query = "UPDATE Usuarios SET nome = :nome, email = :email, senha = :senha, perfil = :perfil  WHERE id_Usuarios = :$id";
      $stmt = $this->db->prepare($query);
    }catch (PDOException $e){
      echo "Erro na preparação da consulta: ".$e->getMessage();
    }
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':senha', $dados['senha']);
    $stmt->bindParam(':perfil', $dados['perfil']);

    try{
      $stmt->execute();
      echo "Seus dados foram atualizados com Sucesso!: ";
    }catch (PDOException $e){
      echo "Erro na inserção: ".$e->getMessage();
    }
  }

  //Excluir registro do usuário
  public function excluir($id)
  {
    try{
      $query = "DELETE FROM Usuarios WHERE id_Usuarios = :$id";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':id',$id, PDO::PARAM_INT);
      $stmt->execute();
    }catch (PDOException $e){
      echo "Erro ao deletar: ".$e->getMessage();
    }
  }
}
