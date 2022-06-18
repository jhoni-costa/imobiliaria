<?php
require_once "AbstractObj.php";
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 16/06/2022                                                                        *
 * @desc Classe com os atributos de uma pessoa                                              *
 *                                                                                          *
 ********************************************************************************************/

class Pessoa extends AbstractObj{

    protected $id;
    protected $nome;
    protected $email;
    protected $telefone;
    protected $flagAtivo;

    /** GETTERS AND SETTERS */
    public function getId(): int{
        return (int) $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNome(): string{
        return (string) $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getEmail(): string{
        return (string) $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getTelefone(): string{
        return (string) $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getFlagAtivo(){
        return $this->flagAtivo;
    }
    public function setFlagAtivo($flagAtivo){
        $this->flagAtivo = $flagAtivo;
    }
    
}