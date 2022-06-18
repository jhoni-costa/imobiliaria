<?php
require_once '../Database/Connection.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Classe mãe que realiza interações com banco de dados (CRUD)                        *
 *                                                                                          *
 ********************************************************************************************/
class AbstractCrud extends Connection{

    protected $tableName;

    public function insert(array $data){
        $campos = "";
        $valores = "";
        foreach($data as $key => $value){
            $campos .= $key . ",";
            $valores .="'{$value}',";
        }
        $campos = substr($campos,0,-1);
        $valores = substr($valores,0,-1);
        $insert = "insert into {$this->tableName} ({$campos})values({$valores});";
        //$this->p($insert);
        try {
            $this->con->query($insert);
            return $this->con->insert_id;
        } catch (Throwable $th) {
            echo mysqli_error($this->con);
            return;
        }
        
    }

    public function update(array $data, $where){
        $update = "update {$this->tableName} set ";
        foreach($data as $key => $value){
            $update .= "{$key} = '{$value}',";
        }
        $update = substr($update,0,-1);
        $update .= "where {$where}";
        return $this->con->query($update);
    }

    public function delete($where){
        $delete = "delete from {$this->tableName} where {$where}";
        return $this->con->query($delete);
    }
    
    public function fetchRow($selectSql){
        $result = $this->con->query($selectSql);
        return mysqli_fetch_assoc($result);
    }

    public function fetchAll($selectSql){
        $result = $this->con->query($selectSql);
        $arrayRet = [];
        while($data = mysqli_fetch_array($result)){
            $arrayRet[] = $data;
        }
        return $arrayRet;
    }
     public function p($param){
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    }

    public function pe($param){
        $this->p($param);
        die();
    }
}