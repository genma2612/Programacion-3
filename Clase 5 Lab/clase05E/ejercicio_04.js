var producto = { "codigoBarra": 111, "nombre": "Lapicera", "precio": 35 };
var pagina = "mostrarColeccionJson.php?miProducto=" + JSON.stringify(producto);
var xm = new XMLHttpRequest();
xm.open('GET', pagina, true);
xm.send();
xm.onreadystatechange = function () {
    if (xm.readyState == 4 && xm.status == 200) {
        alert(xm.responseText);
        console.log(xm.responseText);
    }
};
