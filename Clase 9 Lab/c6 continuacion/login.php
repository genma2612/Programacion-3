<!DOCTYPE html>
<html lang="en">
        <head>
            <title>Ejercicio</title>
            <link type="text/css" rel="stylesheet" href="login.css" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        </head>
        <body>
            <div class="container-fluid">
                <div Class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <form role="form" action="/BACKEND/index.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                </br>
                                <div class="row">
                                    <div class="col-12 text-center"><h4>INGRESO</h4></div>
                                </div>
                                </br>
                                <div class="row">
                                    <div class="col-4 text-center">LEGAJO:</div>
                                    <div class="col-8"><input class="form-control" type="text" name="legajo" id="legajo" value=""/></div>
                                </div>
                                </br>
                                <div class="row">
                                    <div class="col-4 text-center">CLAVE:</div>
                                    <div class="col-8"><input class="form-control" type="text" name="clave" id="clave" value=""/></div>
                                </div>
                                </br>
                                <div class="row">
                                    <div class="col-12 btn-group">
                                        <input class="btn btn-success form-control" type="submit" value="Aceptar" />
                                        <input class="btn btn-danger form-control" type="reset" value="Cancelar" />                                      
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </body>
</html>