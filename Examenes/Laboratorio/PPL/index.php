<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Practica Primer Parcial Lab</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script src="Manejadora.js"></script>
</head>

<body style="background-color:lightblue">
    <div class="container"><br>
    <h1 style="background-color:gray">Gonzalez Manuel</h2>
    <h2>ABM - Clase</h2><br>
    <div class="row responsive-utilities-test visible-on">
        <table class="table table" style="width:90%">
            <tr>
                <td style="width:50%">
                    <table class="table table-hover" style="background-color:cornflowerblue">
                        <tr>
                            <td>Tamaño:</td>
                            <td><input type="text" name="tamaño" id="tamaño" value="" /></td>
                        </tr>
                        <tr>
                            <td>Edad:</td>
                            <td><input type="text" name="edad" id="edad" value="" /></td>
                        </tr>
                        <tr>
                            <td>Precio:</td>
                            <td><input type="text" name="precio" id="precio" value="" /></td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td><input type="text" name="nombre" id="nombre" value="" /></td>
                        </tr>
                        <tr>
                            <td>Raza:</td><td>
                            <select id="raza" style="max-width:180px;min-width:173px" > 
                                <option>salchicha</option>
                                <option>chihuahua</option>
                                <option>pitbull</option>
                                <option>caniche</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Foto:</td>
                            <td><input type="file" id="foto" style="color:blue" /></td>
                        </tr>
                        <tr>
                            <td colspan=2 style="text-align:center"><img id="imgFoto" src="./BACKEND/fotos/huella_default.png" width="400px" height="200px" /></td>
                        </tr>
                        <tr>
                            <td colspan=2>
                            <input type="button" id="btnAgregarJson" value="Agregar JSON" class="btn btn-success" onclick="PrimerParcial.Manejadora.AgregarPerroJSON()"/>
                            <input type="button" id="btnMostrarJson" value="Mostrar JSON" class="btn btn-success" onclick="PrimerParcial.Manejadora.MostrarPerrosJSON()"/>
                            <input type="button" id="btnAgregarBD" value="Agregar en BD" class="btn btn-success" onclick="PrimerParcial.Manejadora.AgregarPerroEnBaseDatos()"/>
                            <input type="button" id="btnVerificarYAgregarBD" value="Verificar y Agregar BD" class="btn btn-success" onclick="PrimerParcial.Manejadora.SubirFoto()"/>
                            <input type="button" id="btnMostrarBD" value="Mostrar BD" class="btn btn-success" onclick="PrimerParcial.Manejadora.SubirFoto()"/>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <div class="" style="background-color:lavenderblush;">
                    <table border="1" style="width:50%">
                        <tr>
                            <td style="text-align:center">
                                <div align="center" id="divPerros" class="">tabla aqui...</div>
                            </td>
                        </tr>
                    </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    </div>
    <input type="hidden" value="subirFoto" id="opcion"/> 
</body>
</html>