<!DOCTYPE html>
<html lang="en">
        <head>
          <title>Ejercicio</title>
          <link type="text/css" rel="stylesheet" href="login.css" />
        </head>
        <body>
        <form action="/BACKEND/index.php" method="post" enctype="multipart/form-data">
        <div id="divTabla">
        <table align="center">
        <th colspan="2">INGRESO</th>
		</thead>
                <tr> 
                    <td colspan="2"> <span>LEGAJO: </span></td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="text" name="legajo" id="legajo" value="" /> </td>
                </tr>
                <tr>
                    <td colspan="2"> <span>CLAVE:</span> </td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="text" name="clave" id="clave" value="" /> </td>
                </tr>
                <tr>
                    <td> <input class="aceptar" type="submit" value="Aceptar" /> </td>
                    <td> <input class="cancelar" type="reset" value="Cancelar" /> </td>
                </tr>
            </table>
        </div>
        </form>
</body>
</html>