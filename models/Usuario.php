<?php
class Usuario{
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
    public function buscar($id){

    }

   /**
     * Listar todos os registros da tabela usuario
     */
    public function listar(){

    }

    /**
     * Cadastrar Usuário
     * @param array $dados
     * @return bool
     */
    public function cadastrar($dados){

    }

   /**
     * Editar Usuário
     * @param int $id 
     * @param array $dados
     * @return bool
     */
    public function editar($id,$dados){

    }

    //Excluir registro do usuário
    public function excluir($id){

    }
}