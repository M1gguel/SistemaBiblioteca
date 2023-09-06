<?php
class Livro
{
    protected $db;
    protected $table = "Livros";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**
   * Buscar registro único
   * @param int $id
   * @return Livro
   */
  public function buscar($id)
  {
    try{

        $query = ("SELECT * FROM {$this->table} WHERE id_Livro = :id");
  
        $stmt = $this->db->prepare($query);  
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
  
    }catch(PDOException $e ){
        echo 'Erro na inserção: ' . $e->getMessage();
        return null;
    }
}
  /**
   * Listar todos os registros da tabela livro
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
   * Cadastrar Livro
   * @param array $dados
   * @return bool
   */
  public function cadastrar($dados)
  {
    try {
        $query = "INSERT INTO Livros (titulo, autor, numero_pagina, preco, ano_publicacao, isbn)
        VALUES (:titulo, :autor, :numero_pagina, :preco, :ano_publicacao, :isbn)";
        $stmt = $this->db->prepare($query);
    }catch (PDOException $e) {
        echo "Erro na preparação da consulta: " . $e->getMessage();
    }
    $stmt->bindParam(':titulo', $dados['titulo']);
    $stmt->bindParam(':autor', $dados['autor']);
    $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
    $stmt->bindParam(':preco', $dados['preco']);
    $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
    $stmt->bindParam(':isbn', $dados['isbn']);

    try {
        $stmt->execute();
        echo "Inserção bem-sucedida!";
    }catch (PDOException $e){
        echo "Erro na inserção" .$e->getMessage();
    }
  }

  /**
   * Editar Livro
   * @param int $id 
   * @param array $dados
   * @return bool
   */
  public function editar($id, $dados)
  {
    try{
        $query = "UPDATE Livros SET titulo = :titulo, autor = :autor, numero_pagina = :numero_pagina, preco = :preco, ano_publicacao = :ano_publicacao , isbn = :isbn WHERE id_Livro = :$id";
        $stmt = $this->db->prepare($query);
    }catch (PDOException $e){
        echo "Erro na preparação da consulta: ".$e->getMessage();
    }
    $stmt->bindParam(':titulo', $dados['titulo']);
    $stmt->bindParam(':autor', $dados['autor']);
    $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
    $stmt->bindParam(':preco', $dados['preco']);
    $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
    $stmt->bindParam(':isbn', $dados['isbn']);

    try{
        $stmt->execute();
        echo "Seus dados foram atualizados com Sucesso!: ";
      }catch (PDOException $e){
        echo "Erro na inserção: ".$e->getMessage();
      }
  }

   //Excluir registro do livro
   public function excluir($id)
   {
    try{
        $query = "DELETE FROM Livros WHERE id_Livro = :$id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    }catch (PDOException $e){
        echo "Erro ao deletar: ".$e->getMessage();
   }
}
}