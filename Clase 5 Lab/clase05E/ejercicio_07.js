var pagina = "traerAuto.php";
var xm = new XMLHttpRequest();
xm.open('GET', pagina, true);
xm.send();
xm.onreadystatechange = function () {
    if (xm.readyState == 4 && xm.status == 200) {
        //console.log(xm.responseText);
        var objJson = JSON.parse(xm.responseText);
        //alert(xm.responseText);
        console.log(objJson);
        console.log(objJson.Marca);
    }
};
