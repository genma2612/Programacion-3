/*! Comentario visible en .js

Función para subir una foto al servidor web y
mostrarla en un tag img, utilizando AJAX

*/
//Comentario no visible en .js
/*Comentario no visible en .js */
window.onload = function () {
    MostrarListado();
};
function MostrarListado() {
    var xhr = new XMLHttpRequest();
    var form = new FormData();
    form.append('op', "MostrarListado");
    xhr.open('POST', './BACKEND/nexo.php', true);
    xhr.setRequestHeader("enctype", "multipart/form-data");
    xhr.send(form);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("divEmpleados").innerHTML = xhr.responseText;
        }
    };
}
function SubirFoto() {
    //INSTANCIO OBJETO PARA REALIZAR COMUNICACIONES ASINCRONICAS
    var xhr = new XMLHttpRequest();
    //RECUPERO LA IMAGEN SELECCIONADA POR EL USUARIO
    var foto = document.getElementById("foto");
    //INSTANCIO OBJETO FORMDATA
    var form = new FormData();
    //AGREGO PARAMETROS AL FORMDATA:
    //PARAMETRO RECUPERADO POR $_FILES
    form.append('foto', foto.files[0]);
    //PARAMETRO RECUPERADO POR $_POST O $_GET (SEGUN CORRESPONDA)
    form.append('op', "subirFoto");
    //Agrego parametros de la clase (Nombre y legajo)
    form.append('nombre', document.getElementById("nombre").value);
    form.append('apellido', document.getElementById("apellido").value);
    form.append('legajo', document.getElementById("legajo").value);
    //METODO; URL; ASINCRONICO?
    xhr.open('POST', './BACKEND/nexo.php', true);
    //ESTABLEZCO EL ENCABEZADO DE LA PETICION
    xhr.setRequestHeader("enctype", "multipart/form-data");
    //ENVIO DE LA PETICION
    xhr.send(form);
    //FUNCION CALLBACK
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            var retJSON = JSON.parse(xhr.responseText);
            if (!retJSON.Ok) {
                console.error("NO se subió la foto!!!");
            }
            else {
                console.info("Foto subida OK!!!");
                MostrarListado();
                document.getElementById("imgFoto").src = "./BACKEND/" + retJSON.Path;
                console.info("Nombre: " + retJSON.Nombre + " Apellido: " + retJSON.Apellido + ". Legajo: " + retJSON.Legajo + ".");
            }
        }
    };
}
function Eliminar($obj) {
    console.log($obj);
}
