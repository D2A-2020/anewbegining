$(document).ready( function () {
  $('#myTable').DataTable();
} );

function login() {
  //var user = prompt("user:");
  //var password = prompt("password:");

  var op = prompt("Elige una opcion: \n1)Clipboard \n2)Formulario");
  var user;
  var password;

  if (op == 1) {
    user = "admin";
    password = "admin";
  } else {
    user = "common";
    password = "common";
  }



  var url = "./control/login.php"
  var data = {
    user,
    password
  };
  console.log(data);

  //if($user == "admin" && $password=="admin"){

  $.ajax(
    {
      method: "POST",
      url: url,
      data: data,
      success: function (data) {
        $("body").html(data);
      }
    }
  );

  //}
}

function sessionEnd() {
  $.ajax(
    {
      method: "POST",
      url: "sessionEnd.php",
      success: function (data) {
        window.location.href = "index.php";


      }
    }
  );
}

