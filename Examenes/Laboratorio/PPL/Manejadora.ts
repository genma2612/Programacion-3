///<reference path="./Perro.ts"/>

namespace PrimerParcial
{
    export class Manejadora
    {
        public static AgregarPerroJSON()
        {
            let xhr : XMLHttpRequest = new XMLHttpRequest();
            let foto : any = (<HTMLInputElement> document.getElementById("foto"));
            let tamaño : string =(<HTMLInputElement> document.getElementById("tamaño")).value;
            let edad : string =(<HTMLInputElement> document.getElementById("edad")).value;
            let precio : string =(<HTMLInputElement> document.getElementById("precio")).value;
            let nombre : string =(<HTMLInputElement> document.getElementById("nombre")).value;
            let raza : string = (<HTMLSelectElement> document.getElementById("raza")).value; 
            let pathFoto : string = '';
            let perro = new Entidades.Perro(tamaño,parseInt(edad),parseFloat(precio),nombre,raza,pathFoto);

            let form : FormData = new FormData();

            form.append('foto', foto.files[0]);
            form.append('json', JSON.stringify(perro.ToJSON()));

            //PARAMETRO RECUPERADO POR $_POST O $_GET (SEGUN CORRESPONDA) AGREGO VERIFICACION PARA MODIFICAR O SUBIR
            //let opcion = (<HTMLInputElement> document.getElementById("opcion")).value
            //form.append('op', opcion);

            xhr.open('POST', './BACKEND/agregar_json.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send(form);
            xhr.onreadystatechange = () => {
            
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let retJSON = JSON.parse(xhr.responseText);
                    if(!retJSON.OK){
                        console.error("NO se subió la foto!!!");
                    }
                    else{
                        console.info("Perro agregado a perro.json correctamente");
                    }
                    //(<HTMLInputElement> document.getElementById("opcion")).value = "subirFoto";
                    //(<HTMLInputElement> document.getElementById("btnPrincipal")).value = "Agregar";
                    //(<HTMLInputElement> document.getElementById("legajo")).disabled = false;
                }
            };
            Manejadora.MostrarPerrosJSON();
        }

        public static MostrarPerrosJSON()
        {
            let xhr : XMLHttpRequest = new XMLHttpRequest();
            xhr.open('POST', './BACKEND/traer_json.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send();
            xhr.onreadystatechange = () => {
        
                if (xhr.readyState == 4 && xhr.status == 200) {
                    (<HTMLDivElement>document.getElementById("divPerros")).innerHTML = xhr.responseText;
                }
            };
        }

        public static AgregarPerroEnBaseDatos()
        {
            let xhr : XMLHttpRequest = new XMLHttpRequest();
            let foto : any = (<HTMLInputElement> document.getElementById("foto"));
            let tamaño : string =(<HTMLInputElement> document.getElementById("tamaño")).value;
            let edad : string =(<HTMLInputElement> document.getElementById("edad")).value;
            let precio : string =(<HTMLInputElement> document.getElementById("precio")).value;
            let nombre : string =(<HTMLInputElement> document.getElementById("nombre")).value;
            let raza : string = (<HTMLSelectElement> document.getElementById("raza")).value; 
            let pathFoto : string = '';

            let perro = new Entidades.Perro(tamaño,parseInt(edad),parseFloat(precio),nombre,raza,pathFoto);
            let form : FormData = new FormData();

            form.append('foto', foto.files[0]);
            form.append('json', JSON.stringify(perro.ToJSON()));

            //PARAMETRO RECUPERADO POR $_POST O $_GET (SEGUN CORRESPONDA) AGREGO VERIFICACION PARA MODIFICAR O SUBIR
            //let opcion = (<HTMLInputElement> document.getElementById("opcion")).value
            //form.append('op', opcion);

            xhr.open('POST', './BACKEND/agregar_json.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send(form);
            xhr.onreadystatechange = () => {
            
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let retJSON = JSON.parse(xhr.responseText);
                    if(!retJSON.OK){
                        console.error("NO se subió la foto!!!");
                    }
                    else{
                        console.info("Perro agregado a db correctamente");
                        console.info(retJSON.perro);
                        //Manejadora.MostrarPerrosBaseDatos();
                    }
                    //(<HTMLInputElement> document.getElementById("opcion")).value = "subirFoto";
                    //(<HTMLInputElement> document.getElementById("btnPrincipal")).value = "Agregar";
                    //(<HTMLInputElement> document.getElementById("legajo")).disabled = false;
                }
            };

        }

        public static VerificarExistencia()
        {

        }

        public static MostrarPerrosBaseDatos()
        {
            let xhr : XMLHttpRequest = new XMLHttpRequest();
            xhr.open('POST', './BACKEND/traer_bd.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send();
            xhr.onreadystatechange = () => {
        
                if (xhr.readyState == 4 && xhr.status == 200) {
                    (<HTMLDivElement>document.getElementById("divPerros")).innerHTML = xhr.responseText;
                }
            };
        }

    }
}