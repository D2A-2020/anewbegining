<?php

class Connection extends PDO{

    private $dns = "mysql:host=db;dbname=aNewBegening;charset=utf8"; 
    private $user = "root";
    private $passwd = "root";
    protected static $con;

    
    function __construct(){

        try{
            //echo $this->dns ." ". $this->user ." ". $this->passwd." | ";
            $this->con = new PDO($this->dns,$this->user,$this->passwd);
            
        }catch(Exception $e){
            throw($e) ;   
            die();
        }
    }

    public static function connect(){
        new Connection();
        //this options allows to see the error at mysql's engine
        $connect_options_arr = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        return new PDO("mysql:host=db;dbname=aNewBegening;charset=utf8","root","root",$connect_options_arr);
    }

    function ask($query, $array=[]){ //devuelve ordenado
        
        try{
            $stmt = $this->con->prepare($query);
            $stmt->execute($array); 
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "error!";
            throw($e);
        }
    }
    
    function nonquery($query, $array=[]){// devuelve row afectadas
        try{
            $stmt = $this->con->prepare($query);
            return $stmt->execute($array); 
            //echo $stmt->columnCount();
            return $stmt->rowCount();
            
        }catch(Exception $e){
            echo "error!";
            throw($e);
        }
    }

    function countQuery($query, $array=[]){// solo cuenta filas recibidas
        try{
            $stmt = $this->con->prepare($query);
            $stmt->execute($array); 
            return $stmt->fetchColumn(); 
        }catch(Exception $e){
            echo "error!";
            throw($e);
        }
    }
    
}
?>
