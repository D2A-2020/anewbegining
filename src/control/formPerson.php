<?php 
//PENDIENTE!
//este tipo de archivos debe ser parte de un backend que recibira las peticiones de
//los frontends con distintos permisos, estos se verificaran para determinar si brindar el acceso 
// a la database o no. 
require_once "../connection.php";
require_once "../model/person.php";

$person = $_REQUEST;

$ci = $person['ci'];
$name = $person['name'];
$surname = $person['surname'];
$password = $person['password'];
$email = $person['email'];
$civil = $person['civil'];
$sex = $person['sex'];
$birth_date = $person['birth_date'];
$phone = $person['phone'];
$nationality = $person['nationality'];
$health_card = $person['health_card'];
$license = $person['license'];


$mPerson = new Person();
$mPerson->setPerson(
$ci,
$name,
$surname,
$password,
$email,
$civil,
$sex,
$birth_date,
$phone,
$nationality,
$health_card,
$license);

// $mPerson->editPerson(1,$ci,
// $name,
// $surname,
// $password,
// $email,
// $civil,
// $sex,
// $birth_date,
// $phone,
// $nationality,
// $health_card,
// $license);




?>
