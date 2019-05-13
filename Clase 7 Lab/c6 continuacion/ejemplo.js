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
    //PARAMETRO RECUPERADO POR $_POST O $_GET (SEGUN CORRESPONDA) AGREGO VERIFICACION PARA MODIFICAR O SUBIR
    var opcion = document.getElementById("opcion").value;
    form.append('op', opcion);
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
            document.getElementById("opcion").value = "subirFoto";
            document.getElementById("btnPrincipal").value = "Agregar";
            document.getElementById("legajo").disabled = false;
        }
    };
}
function Eliminar($obj) {
    if (confirm("Confirmar eliminacion"))
        //Funcion que borre la linea del archivo
        console.log($obj);
    else
        console.log("Eliminacion cancelada");
}
function Modificar($obj) {
    //llena los campos del formulario con los atributos del obj json
    document.getElementById("nombre").value = $obj.nombre;
    document.getElementById("apellido").value = $obj.apellido;
    document.getElementById("legajo").value = $obj.legajo;
    document.getElementById("legajo").disabled = true;
    document.getElementById("imgFoto").src = $obj.path_foto;
    //(<HTMLInputElement> document.getElementById("foto")).src = $obj.path_foto;
    document.getElementById("btnPrincipal").value = "Modificar";
    //localStorage.setItem("modificar", true);
    document.getElementById("opcion").value = "modificarEmpleado";
    console.log($obj);
}
