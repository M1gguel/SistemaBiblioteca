<?php
class Aluno
{
    protected $db;
    protected $table = "Alunos";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**
     * Buscar registro único
     * @param int $id
     * @return Aluno
     */
    public function buscar($id)
    {
        try {

            $query = ("SELECT * FROM {$this->table} WHERE id_Aluno = :id");

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erro na inserção: ' . $e->getMessage();
            return null;
        }
    }

    /**
     * Listar todos os registros da tabela usuario
     */
    public function listar()
    {
        try {

            $query = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
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
            $query = "INSERT INTO {$this->table} (nome, cpf, email, telefone, celular, data_nascimento)
              VALUES (:nome, :email, :senha, :perfil)";
      
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':nome', $dados['nome']);
          $stmt->bindParam(':email', $dados['email']);
          $stmt->bindParam(':senha', $dados['senha']);
          $stmt->bindParam(':perfil', $dados['perfil']);
          
          return true;
          }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
          }
    }
    public function editar($id, $dados)
    {
        try {
            $query = "UPDATE Alunos SET nome = :nome, cpf = :cpf, email = :email, telefone = :telefone, celular = :celular, data_nascimento = :data_nascimento WHERE id_Aluno = :$id";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':celular', $dados['celular']);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao editar: " . $e->getMessage();
            return false;
        }
    }
}
