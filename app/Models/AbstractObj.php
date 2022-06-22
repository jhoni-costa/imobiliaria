<?php 
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 16/06/2022                                                                        *
 * @desc Classe base com alguns metodos uteis
 ********************************************************************************************/
class AbstractObj{

    /* Metodo para facilitar inserindo as tags <pre> do html e print_r do parametro passado */
    public function p($param){
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    }

    /* Metodo para facilitar inserindo as tags <pre> do html e print_r do parametro passado
       Em seguida mata o processo em execução*/
    public function pe($param){
        $this->p($param);
        die();
    }
  
    /* Retorna dia e hora atual */
    public function now(){
        return date("Y-m-d H:i:s");
    }
    
    /* Retorna dia atual */
    public function currentDay(){
        return date("Y-m-d");
    }

    /* Retorna hora atual */
    public function oClock(){
        return date("H:i:s");
    }

    /* Calcula os dias entre uma data inicial e uma data final */
    public function calculaDias($dataInicial, $dataFinal){
        $dif = strtotime($dataFinal) - strtotime($dataInicial);
        return floor($dif/(60*60*24));
    }

    /* Formata valor decimal para .  */
    public function formataValor($valor){
        // $valor = str_replace(".","",$valor);
        $valor = str_replace(",",".",$valor);
        return $valor;
    }
}