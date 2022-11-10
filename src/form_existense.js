function passwordExists(password, checked = null) {
    var result="";

    if (checked == null) {
        
        var data = {
            password: password
        }
        $.ajax(
            {
                async:false, //parece que aca estaba el error
                data: data,
                url: "control/exists.php",
                method: "POST",
                success: function (data) {
                    var res = JSON.parse(data)['data'];
                    result = res;
                    // console.log("ajax: " + res);
                    // console.log("ajax: " + result);
               },

                error: function () {
                    alert("Error en servidor");

                }
            }
            
        );
        
        return result;
    } 
}

//...........................................


function userExists(ci = null, id = null) {

    var result;
    var data = {
        ci: ci,
        id: id };

    if (ci != null) {
        $.ajax(
            {
                async: false,
                data: data,
                url: "control/exists.php",
                method: "POST",
                success: function (data) {
                    var res = JSON.parse(data)['data'];
                    result = res;
                },
                error: function () {
                    alert("Error en el servidor")
                    result = "error1";
                }

            }
        );

    }

    if (id != null) {
        $.ajax(
            {
                async: false,
                data: {id:id},
                url: "control/exists.php",
                method: "POST",
                success: function (data) {
                    var res = JSON.parse(data)['data'];
                    result = res;
                },
                error: function () {
                    alert("Error en servidor");
                    result = "error2";
                }
            }
        );
    }

    return result;
}


function emailExists(email) {
    var result;

    $.ajax(
        {
            async: false,
            data: {email:email},
            url: "control/exists.php",
            method: "POST",
            success: function (data) {
                var res = JSON.parse(data)['data'];
                result = res;
                },
            error: function () {
                alert("Error en servidor");
                result = "error3";
            }
        }
    );

    return result;
}