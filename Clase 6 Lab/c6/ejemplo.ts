/*! Comentario visible en .js

Función para subir una foto al servidor web y 
mostrarla en un tag img, utilizando AJAX

*/

//Comentario no visible en .js

/*Comentario no visible en .js */                    

window.onload = function() // Se carga luego de que finalice la carga de los elementos de la pagina
{
    MostrarListado();
}

function MostrarListado() : void
{
    let xhr : XMLHttpRequest = new XMLHttpRequest();
    let form : FormData = new FormData();
    form.append('op', "MostrarListado");
    xhr.open('POST', './BACKEND/nexo.php', true);
    xhr.setRequestHeader("enctype", "multipart/form-data");
    xhr.send(form);
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4 && xhr.status == 200) {
            (<HTMLDivElement>document.getElementById("divEmpleados")).innerHTML = xhr.responseText;
        }
    };
}

function SubirFoto() : void {
    
    //INSTANCIO OBJETO PARA REALIZAR COMUNICACIONES ASINCRONICAS
    let xhr : XMLHttpRequest = new XMLHttpRequest();

    //RECUPERO LA IMAGEN SELECCIONADA POR EL USUARIO
    let foto : any = (<HTMLInputElement> document.getElementById("foto"));

    //INSTANCIO OBJETO FORMDATA
    let form : FormData = new FormData();

    //AGREGO PARAMETROS AL FORMDATA:

    //PARAMETRO RECUPERADO POR $_FILES
    form.append('foto', foto.files[0]);

    //PARAMETRO RECUPERADO POR $_POST O $_GET (SEGUN CORRESPONDA)
    form.append('op', "subirFoto");

    //Agrego parametros de la clase (Nombre y legajo)
    form.append('nombre', (<HTMLInputElement> document.getElementById("nombre")).value);
    form.append('apellido', (<HTMLInputElement> document.getElementById("apellido")).value);
    form.append('legajo', (<HTMLInputElement> document.getElementById("legajo")).value);

    //METODO; URL; ASINCRONICO?
    xhr.open('POST', './BACKEND/nexo.php', true);

    //ESTABLEZCO EL ENCABEZADO DE LA PETICION
    xhr.setRequestHeader("enctype", "multipart/form-data");

    //ENVIO DE LA PETICION
    xhr.send(form);

    //FUNCION CALLBACK
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4 && xhr.status == 200) {

            console.log(xhr.responseText);
            
            let retJSON = JSON.parse(xhr.responseText);
            if(!retJSON.Ok){
                console.error("NO se subió la foto!!!");
            }
            else{
                console.info("Foto subida OK!!!");
                MostrarListado();
                (<HTMLImageElement> document.getElementById("imgFoto")).src = "./BACKEND/" + retJSON.Path;
                console.info("Nombre: "  + retJSON.Nombre + " Apellido: " + retJSON.Apellido + ". Legajo: " + retJSON.Legajo + ".");
            }
        }
    };
}

function Eliminar($obj:JSON)
{
    console.log($obj);
}