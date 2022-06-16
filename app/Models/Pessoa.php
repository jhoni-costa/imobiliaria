<?php
require_once "AbstractObj.php";
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 16/06/2022                                                                        *
 * @desc Classe com os atributos de uma pessoa                                              *
 ********************************************************************************************/

class Pessoa extends AbstractObj{

    protected int $id;
    protected string $nome;
    protected string $email;
    protected string $telefone;
    protected boolean $flagAtivo;

    /** GETTERS AND SETTERS */
    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome(string $nome){
        $this->nome = $nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone(string $telefone){
        $this->telefone = $telefone;
    }
    public function getFlagAtivo(){
        return $this->flagAtivo;
    }
    public function setFlagAtivo(string $flagAtivo){
        $this->flagAtivo = $flagAtivo;
    }
    
}