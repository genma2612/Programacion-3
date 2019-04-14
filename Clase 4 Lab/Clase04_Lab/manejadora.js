var AJAX;
(function (AJAX) {
    function Saludar() {
        var xm = new XMLHttpRequest();
        xm.open("GET", "administrar.php", true);
        xm.send();
        xm.onreadystatechange = function () {
            if (xm.readyState == 4 && xm.status == 200) {
                console.log(xm.responseText);
                document.getElementById("div_mostrar").innerHTML = "Respuesta: " + xm.responseText;
                alert(xm.responseText);
            }
        };
    }
    AJAX.Saludar = Saludar;
    function Ingresar() {
        var accion = 2;
        var xm = new XMLHttpRequest();
        var nombre = document.getElementById("nombre").value;
        xm.open("GET", "administrar.php?accion=" + accion + "&cadena=" + nombre, true);
        xm.send();
        xm.onreadystatechange = function () {
            if (xm.readyState == 4 && xm.status == 200) {
                if (xm.responseText == "1") {
                    Mostrar();
                }
                else
                    alert("Error al escribir el archivo");
                console.log(xm.responseText);
                //(<HTMLDivElement> document.getElementById("div_mostrar")).innerHTML = "Respuesta: " + xm.responseText;
                //alert(xm.responseText);
            }
        };
    }
    AJAX.Ingresar = Ingresar;
    function Mostrar() {
        var xm = new XMLHttpRequest();
        xm.open("GET", "administrar.php?accion=3", true);
        xm.send();
        xm.onreadystatechange = function () {
            if (xm.readyState == 4 && xm.status == 200) {
                console.log(xm.responseText);
                document.getElementById("div_mostrar").innerHTML = xm.responseText;
            }
        };
    }
    AJAX.Mostrar = Mostrar;
})(AJAX || (AJAX = {}));
