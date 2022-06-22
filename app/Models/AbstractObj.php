<?php 
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 16/06/2022                                                                        *
 * @desc Classe base com alguns metodos uteis
 ********************************************************************************************/
class AbstractObj{
    
    public function p($param){
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    }

    public function pe($param){
        $this->p($param);
        die();
    }
  
    public function now(){
        return date("Y-m-d H:i:s");
    }
    
    public function currentDay(){
        return date("Y-m-d");
    }
    
    public function oClock(){
        return date("H:i:s");
    }

    public function calculaDias($dataInicial, $dataFinal){
        $dif = strtotime($dataFinal) - strtotime($dataInicial);
        return floor($dif/(60*60*24));
    }
}