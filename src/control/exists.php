<?php
require_once "../connection.php";
require_once "../model/person.php";

$ci = $_REQUEST['ci'];
$id = $_REQUEST['id'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

//echo $_REQUEST;

$p = new Person();

if(!empty($ci)){    
    if($p->countCi($ci)>0){ //si hay una fila o mas con ese ci
        $result =  true;
    }else{
        $result =  false;
    }
    $array = ['data' => $result];
    echo json_encode($array);}

if(!empty($id)){
    if($p->countId($id)>0){ 
        $result =  true;
    }else{
        $result =  false;
    }
    $array = ['data' => $result];
    echo json_encode($array);}

if(!empty($email)){
    if($p->countEmail($email)>0){ 
        $result = true;
    }else{
        $result = false;
    }
    $array = ['data' => $result];
    echo json_encode($array);}

if(!empty($password)){
    try{

    if($p->countPassword($password)>0){ 
        $result = true;
    }else{
        $result = false;
    }
    }catch(Exception $e){
        $result=$e->getMessage();
        throw($e->getMessage());
    }
    $array = ['data' => $result];
    echo json_encode($array);
}

