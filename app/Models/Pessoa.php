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
    public function setId(int $id){
        $this->id = $id;
    }
    public function getNome(): string{
        return $this->nome;
    }
    public function setNome(string $nome){
        $this->nome = $nome;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function getTelefone(): string{
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