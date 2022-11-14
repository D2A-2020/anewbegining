<?php 
session_start();
require "topPanel.php";
include_once "connection.php";
include_once "model/person.php";
//include_once "cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css";
//include_once "cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js";


?>

<link rel="stylesheet" href="./css/bootstrap.min.css">
<script src="funciones.js"></script>
<script src="jquery-3.6.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<head>
    <title>clipboard</title>
</head>
<body style="background-color:darkgrey">
<div id="div.clipboard" style="margin-left:50px;margin-top:20px" >


    <table class="table table-responsive" style="border:1px solid black;">
    <caption> Personas</caption>
            <th>ID</th>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Clave</th>
            <th>Correo</th>
            <th>Estado Civil</th>
            <th>Sexo</th>
            <th>Nacimiento</th>
            <th>Contacto</th>
            <th>Nacionalidad</th>
            <th>Carne S.</th>
            <th>Libreta cat A</th>
            <th>Activo</th>
            
            <tbody id="tbody">
               <?php 
                    
                    //use datatables, create control bridge and method
                    // try{
                    //     require "list_persona.php";
                    // }catch(Exception $e){
                    //     echo "<em>Por el momento no podemos brindar esta informacion</em>";
                    // } 
                    
                    

                     $per =new Person();
                     echo $per->getPersons();

                   
            ?>
            </tbody>

        
    </table>

    <input class="btn btn-primary" style="padding:2px; margin:3px;margin-top:20px" type="button" value="Refrescar" onclick="refresh()">

    <script>
        function refresh(){
            alert("tabla refrescada?");
        }
    </script>
</div>    
</body>
