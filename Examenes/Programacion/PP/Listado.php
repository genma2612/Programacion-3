<?php
require_once('./clases/Juguete.php');
$juguetes = Juguete::Traer();
//var_dump($juguetes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla de Juguetes</title>
</head>
<body>
    <table border="1">
    <tr><td>TIPO</td><td>PRECIO</td><td>PAIS</td><td>FOTO</td></tr>
      <?php
      foreach($juguetes as $juguete)
      {
        $tempArray = explode("-", $juguete->ToString());
          ?> <tr>
              <td>
                <?php echo $tempArray[0];?>
              </td>
              <td>
                <?php echo $tempArray[1]; ?>
              </td>
              <td>
                <?php echo $tempArray[2]; ?>
              </td>
              <td>
               <img src="<?php echo $tempArray[3];?>" height="100" width="100">
              </td>
          </tr>
          <?php
      }
    ?>
    </table>
</body>
</html>