<?php
// require_once '../Database/Connection.php';
require_once '../app/Database/Connection.php';
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Classe mãe que realiza interações com banco de dados (CRUD)                        *
 *                                                                                          *
 ********************************************************************************************/
class AbstractCrud extends Connection{

    // Deve ser definido o nome da tabela que sera utilizada nesta variavel. Ela é utilizada nos métodos do CRUD
    protected $tableName;

    /*  Metodo que insere uma entidade no banco de dados.
        Recebe como parametro um array onde a chave é o nome do campo no banco de dados
        e o valor é a informação a ser inserida */
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
        // $this->p($insert);
        try {
            $this->con->query($insert);
            return $this->con->insert_id;
        } catch (Throwable $th) {
            echo mysqli_error($this->con);
            return;
        }
        
    }

    /*  Metodo que realiza update em uma entidade do banco de dados, recebe como parametro:
        Array $data onde a chave é nome do campo do banco de dados e o valor a informação a ser modificada 
        String $where que são as condições utilizadas no where do update*/
    public function update(array $data, $where){
        $update = "update {$this->tableName} set ";
        foreach($data as $key => $value){
            $update .= "{$key} = '{$value}',";
        }
        $update = substr($update,0,-1);
        $update .= "where {$where}";
        // $this->pe($update);
        return $this->con->query($update);
    }

    /* Metodo que deleta um registro do banco de dados, tem como parametro:
        string $where = condição de exclusão */
    public function delete($where){
        $delete = "delete from {$this->tableName} where {$where}";
        return $this->con->query($delete);
    }
    
    /* Metodo que retorna (array) apenas um registro do banco de dados passando uma query */
    public function fetchRow($selectSql){
        $result = $this->con->query($selectSql);
        return mysqli_fetch_assoc($result);
    }
    
    /* Metodo que retorna (array) todos os registro do banco de dados passando uma query */
    public function fetchAll($selectSql){
        $result = $this->con->query($selectSql);
        $numRows = @mysqli_num_rows($result);
        // $this->pe($selectSql);
        $arrayRet = [];
        if($numRows > 0){
            while($data = mysqli_fetch_assoc($result)){
                $arrayRet[] = $data;
            }
        }
        return $arrayRet;
    }

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

    /* Metodo que facilita, inserindo as tags <pre> do html e var_dump do parametro passado */
    public function vd($param){
        echo "<pre>";
        var_dump($param);
        echo "</pre>"; 
    }

    /* Gera um alerta no navegador com a string passada */
    public function msg_alert($string){
        echo "<script>";
        echo "alert('{$string}')";
        echo "</script>";
    }

    /* Metodo auxiliar que retorna todos os estados do Brasil */
    public function getEstados(){
        return $this->fetchAll('select * from tb_estados');
    }
}