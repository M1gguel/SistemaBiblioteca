<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/ALuno.php";
 class AlunoController
{
    private $alunoModel;

    public function __construct()
    {
        $this->alunoModel = new Aluno();
    }
    public function listarAlunos(){
        return $this->alunoModel->listar();
    }
}