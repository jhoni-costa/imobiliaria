<?php
require_once '../Database/Connection.php';

class AbstractCrud extends Connection{

    protected $tableName;

    public function insert(array $data){
        foreach($data as $key => $value){
            $campos = $key . ",";
            $valores = $value . ",";
        }
        $campos = substr($campos,0,-1);
        $valores = substr($valores,0,-1);
        $insert = "insert into {$this->tableName} ({$campos})values({$valores});";
        return $this->con->mysqli_query($insert);
    }

    public function update(array $data, $where){
        $update = "update {$this->tableName} set ";
        foreach($data as $key => $value){
            $update .= "{$key} = '{$value}',";
        }
        $update = substr($update,0,-1);
        $update .= "where {$where}";
        return $this->con->mysqli_query($insert);
    }

    public function delete($where){
        $delete = "delete from {$this->dbName} where {$where}";
        return $this->con->mysqli_query($delete);
    }
    
    public function fetchRow($selectSql){
        $result = $this->con->mysqli_query($selectSql);
        return mysqli_fetch_assoc($result);
    }

    public function fetchAll($selectSql){
        $result = $this->con->mysqli_query($selectSql);
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