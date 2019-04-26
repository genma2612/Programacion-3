let producto : any = { "codigoBarra" : 111, "nombre" : "Lapicera", "precio" : 35 };
let pagina = "mostrarColeccionJson.php?miProducto=" + JSON.stringify(producto);
let xm = new XMLHttpRequest();
xm.open('GET', pagina, true);
xm.send();
xm.onreadystatechange = () => 
{
    if (xm.readyState == 4 && xm.status == 200) 
    {
        alert(xm.responseText);
        console.log(xm.responseText);
    }
}