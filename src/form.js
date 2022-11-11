function formPerson() {

 // hardcoded----------------
 person['ci'] = random_ci();
 // person['phone'] = 092981793;
 // person['name'] = "david";
 // person['surname'] = "santos";
 a = Math.floor(Math.random()*100);

  person['email'] = "quino"+a+"@gmail.com";
  person['password1'] = "quesoFundido"+a;
  person['password2'] = "quesoFundido"+a;
 // person['politics'] = true;
 // person['civil'] = "divorciado";
 // person['sex'] = "hombre";
 // person['health_card'] = 1; //true
 // person['license'] = 1;
 // person['nationality'] = "portugues";
 // person['birth_date'] = 567648000000; //18 annos

 // hardcoded----------------
 
  var person = new Array();


  person['name'] = $("#name").val();
  person['surname'] = $("#surname").val();
  person['password1'] = $("#password1").val();
  person['password2'] = $("#password2").val();
  person['civil'] = $("input[name=civil]:checked").val();
  person['sex'] = $("input[name=sex]:checked").val();
  person['birth_date'] = Date.parse(new Date($("#birth_date").val() + " 00:00:00"));  //aaaa-mm-dd hh-mm-ss
  person['email'] = $("#email").val();
  person['phone'] = $("#phone").val();
  person['nationality'] = $("#nationality").val();
  person['politics'] = $("#politics").prop('checked');
  person['health_card'] = $("#health_card").prop('checked');
  person['license'] = $("#license").prop('checked');

 



  //---------------------------------------------------------------------
  //comprobacion de datos correctos en general:


  var errors = new Array();


  for (var key in person) {
    if (person[key].length == "0" || person[key].length > 255) {
      error = "Campos vacios";
      errors.push(error);
      break;
    }
  }

  //Rectificating data type...............
  if (person['license'] == true) {
    person['license'] = 1;
  } else {
    person['license'] = 0;
  }

  if (person['health_card'] == true) {
    person['health_card'] = 1;
  } else {
    person['health_card'] = 0;
  }
  //end Rectificating data type...............


  if (errors.length === 0) { //si no hay campos vacios q los analice
    //password______________________________     
    if (person['password1'].length < 8) {
      errors.push('La constrasena debe ser de 8 caracteres y tiene que contener una letra y un numero');
    } else if (person['password1'] != person['password2']) {
      errors.push('Las contrasenas no coinciden');
    } else if (passwordExists(person['password1']) == true) {
      errors.push("Contrasenna en uso");
    }

    //password_____end_________________________

    if (person['sex'] == "other") {
      person['sex'] = $("#field_other").val();
      if (person['sex'].length > 9) {
        errors.push('El campo "sexo" solo puede contener 10 caracteres');
      }
    }


    if ((Date.now() - person['birth_date']) < 567648000000) { //tiene 18 annos?
      errors.push("La edad minima es de 18 annos");
    } else {
      var date = new Date(person['birth_date']); 
      var year = date.getFullYear();
      var month = ("0" + (date.getMonth() + 1)).slice(-2);
      var day = ("0" + date.getDate()).slice(-2);

      person['birth_date'] = `${year}-${month}-${day}`;


    }



    if (emailExists(person['email']) == true) {
      errors.push("Email ya asociado!");
    }
    //pendiente:
    // if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(person['email']))){
    //   error = "Correo no valido";
    //   errors.push(error);
    //  }
    if (person['politics'] == false) {
      errors.push("debe aceptar las politicas");
    }
    if (person['phone'].length < 9) {
      errors.push("Numero de telefono incorrecto (Formato:092987654)");
    }


    try {
      if (validate_ci(person['ci']) == false) {
        errors.push("CI invalida");
      }
    } catch (error) {
      errors.push("CI invalida");
    }

    if (userExists(person['ci']) == true) {
      errors.push("La cedula ya existe.");
    }


  }

  console.log(person);

  if (errors.length > 0) {
    console.log(errors);
  }
  //---------------------------------------------------------------------
  if (errors.length === 0) { //si todos los elementos del array son correctos:
    var data = {
      ci: person['ci'],
      name: person['name'],
      surname: person['surname'],
      password: person['password1'],
      email: person['email'],
      civil: person['civil'],
      sex: person['sex'],
      birth_date: person['birth_date'],
      phone: person['phone'],
      nationality: person['nationality'],
      health_card: person['health_card'],
      license: person['license']
    }
    $.ajax(
      {
        async: false,
        method: "POST",
        data: data,
        url: "control/formPerson.php",
        success: function (data) {
          if (data == "") {
            $("#div_result").css("border", "1px solid green");
            $("#div_result").html("REGISTRO EXITOSO!");
          } else {
            console.log(data);
            $("#div_result").css("border", "1px solid red");
            $("#div_result").html("Algo salio mal");
          }
        },
        error: function () {
          alert('algo salio mal...\n');
        }

      }
    );
  } else {
    //    var message = "";
    //errors.forEach(element => message= message + element+"\n");
    errors.forEach(element => alert(element));
    //      alert(message);
  }
}
