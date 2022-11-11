<?php require "topPanel.php" ?>

<head>
    <title>Formulario</title>
</head>

<body style="background-color:darkgrey;">
    
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="form.js"></script>
    <script src="form_existense.js"></script>
    <script src="jquery-3.6.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="ci.js"></script>

    <div style="margin-left:50px;margin-top:20px">
        <h3>Formulario</h3>

        <div style="display: block;margin-left:auto;margin-right:auto;width:50%;">
            <p>Algunos datos que necesitamos:</p>
            <div style="border: 1px solid black;padding:5px">
                <form autocomplete="on">
                    <ol style="width: 90%;">
                        <li>Datos Personales:

                            <input class="form-control" value="juan pablo" type="text" placeholder="Nombre" id="name">

                            <input class="form-control" value="gimenez" type="text" placeholder="Apellido" id="surname">

                            <input class="form-control" type="number" disabled placeholder="Documento harcoded" id="document">
                        </li>
                        <li>
                            <ul>
                                <li>
                                    Defina una contrasena:
                                    <input class="form-control" type="password" placeholder="Cotrasena" id="password1">
                                </li>
                                <li>
                                    Confirme:
                                    <input class="form-control" type="password" placeholder="Cotrasena" id="password2">
                                </li>
                            </ul>

                        </li>

                        <li>Estado Civil:
                            <ul>
                                <li><input disabled checked class="form-check-input" type="radio" name="civil" value="Soltero">Soltero</li>
                                <li><input disabled class="form-check-input" type="radio" name="civil" value="Casado">Casado</li>
                                <li><input disabled class="form-check-input" type="radio" name="civil" value="Divorciado">Divorsiado</li>
                                <li><input disabled class="form-check-input" type="radio" name="civil" value="Viudo">Viudo</li>
                                <li><input disabled class="form-check-input" type="radio" name="civil" value="Concubinato">Union Concubinaria</li>
                            </ul>
                        </li>
                        <li>Sexo:
                            <ul>
                                <li><input checked class="form-check-input" type="radio" name="sex" value="Hombre">Hombre</li>
                                <li><input class="form-check-input" type="radio" name="sex" value="Mujer">Mujer</li>
                                <li><input disabled class="form-check-input" type="radio" name="sex" value="other"> Otro: <input disabled class="form-control" type="text" id="field_other"></li>
                            </ul>
                        </li>
                        <li>
                            Fecha de Nacimiento: <span style="color:gray"><em>con formato: 17/03/1993</em></span>
                            <ul>
                                <input required disabled class='form_control' type="date" max="2002-01-01" value="2002-01-01" min="1960-01-01" name="" id="birth_date" style="color:gray; display:inline; padding:0.5em;border-radius:10px;border: 1px solid gray">
                                            
                        </li>

                        </ul>
                        </li>
                        <li>Contacto:
                            <ul>
                                <li>Email: <input class="form-control" disabled type="email" name="" id="email" placeholder="juan@gmail.com harcoded"></li>
                                <li>Telefono: <input value="092981793" class="form-control" type="tel" name="" id="phone" placeholder="092897345"></li>
                            </ul>
                        </li>
                        <li>
                            <label for="">Nacionalidad:</label>
                            <select name="nacionalidad" id="nationality" class="form-control">
                                <option value="Uruguay">Uruguay</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Brasil">Brasil</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </li>
                        <li>
                            Comprende con claridad y acepta la politica de privacidad de Papa Louie S.A.?
                            <ul>
                                <li><input class="form-check-input" checked active type="checkbox" name="politica" id="politics">Estoy de Acuerdo</li>
                            </ul>
                        </li>
                        <li><input checked class="form-check-input" type="checkbox" name="card" id="health_card"> Cuento con carne de salud vigente</li>
                        <li><input class="form-check-input" type="checkbox" name="license" id="license"> Cuento con libreta de conducir cat. A</li>

                    </ol>
                </form>
            </div>
            <br>
            <input class="btn btn-primary" type="button" value="Enviar" onclick="formPerson()">

        <div  style="height: 200px;text-align: center;">
            <div id="div_result" style="padding: 10px;margin: auto;display: inline;">

            </div>
        </div>
        </div>
    </div>
</body>