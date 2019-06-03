var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var Entidades;
(function (Entidades) {
    var Mascota = /** @class */ (function () {
        function Mascota(tamaño, edad, precio) {
            this.tamano = tamaño;
            this.edad = edad;
            this.precio = precio;
        }
        Mascota.prototype.ToString = function () {
            return '"tamano":"' + this.tamano + '","edad":"' + this.edad + '","precio":"' + this.precio + '"';
        };
        return Mascota;
    }());
    Entidades.Mascota = Mascota;
})(Entidades || (Entidades = {}));
///<reference path="./Mascota.ts"/>
var Entidades;
(function (Entidades) {
    var Perro = /** @class */ (function (_super) {
        __extends(Perro, _super);
        function Perro(tamaño, edad, precio, nombre, raza, pathFoto) {
            var _this = _super.call(this, tamaño, edad, precio) || this;
            _this.nombre = nombre;
            _this.raza = raza;
            _this.pathFoto = pathFoto;
            return _this;
        }
        Perro.prototype.ToJSON = function () {
            return JSON.parse('{"nombre":"' + this.nombre + '","raza":"' + this.raza + '",' + this.ToString() + ',"pathFoto":"' + this.pathFoto + '"}');
        };
        return Perro;
    }(Entidades.Mascota));
    Entidades.Perro = Perro;
})(Entidades || (Entidades = {}));
///<reference path="./Perro.ts"/>
var PrimerParcial;
(function (PrimerParcial) {
    var Manejadora = /** @class */ (function () {
        function Manejadora() {
        }
        Manejadora.AgregarPerroJSON = function () {
            var xhr = new XMLHttpRequest();
            var foto = document.getElementById("foto");
            var tamaño = document.getElementById("tamaño").value;
            var edad = document.getElementById("edad").value;
            var precio = document.getElementById("precio").value;
            var nombre = document.getElementById("nombre").value;
            var raza = document.getElementById("raza").value;
            var pathFoto = '';
            var perro = new Entidades.Perro(tamaño, parseInt(edad), parseFloat(precio), nombre, raza, pathFoto);
            var form = new FormData();
            form.append('foto', foto.files[0]);
            form.append('json', JSON.stringify(perro.ToJSON()));
            //PARAMETRO RECUPERADO POR $_POST O $_GET (SEGUN CORRESPONDA) AGREGO VERIFICACION PARA MODIFICAR O SUBIR
            //let opcion = (<HTMLInputElement> document.getElementById("opcion")).value
            //form.append('op', opcion);
            xhr.open('POST', './BACKEND/agregar_json.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send(form);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var retJSON = JSON.parse(xhr.responseText);
                    if (!retJSON.OK) {
                        console.error("NO se subió la foto!!!");
                    }
                    else {
                        console.info("Perro agregado a perro.json correctamente");
                        Manejadora.MostrarPerrosJSON();
                    }
                    //(<HTMLInputElement> document.getElementById("opcion")).value = "subirFoto";
                    //(<HTMLInputElement> document.getElementById("btnPrincipal")).value = "Agregar";
                    //(<HTMLInputElement> document.getElementById("legajo")).disabled = false;
                }
            };
        };
        Manejadora.MostrarPerrosJSON = function () {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './BACKEND/traer_json.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("divPerros").innerHTML = xhr.responseText;
                }
            };
        };
        Manejadora.AgregarPerroEnBaseDatos = function () {
            var xhr = new XMLHttpRequest();
            var foto = document.getElementById("foto");
            var tamaño = document.getElementById("tamaño").value;
            var edad = document.getElementById("edad").value;
            var precio = document.getElementById("precio").value;
            var nombre = document.getElementById("nombre").value;
            var raza = document.getElementById("raza").value;
            var pathFoto = '';
            var perro = new Entidades.Perro(tamaño, parseInt(edad), parseFloat(precio), nombre, raza, pathFoto);
            var form = new FormData();
            form.append('foto', foto.files[0]);
            form.append('json', JSON.stringify(perro.ToJSON()));
            //PARAMETRO RECUPERADO POR $_POST O $_GET (SEGUN CORRESPONDA) AGREGO VERIFICACION PARA MODIFICAR O SUBIR
            //let opcion = (<HTMLInputElement> document.getElementById("opcion")).value
            //form.append('op', opcion);
            xhr.open('POST', './BACKEND/agregar_json.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send(form);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var retJSON = JSON.parse(xhr.responseText);
                    if (!retJSON.OK) {
                        console.error("NO se subió la foto!!!");
                    }
                    else {
                        console.info("Perro agregado a db correctamente");
                        console.info(retJSON.perro);
                        //Manejadora.MostrarPerrosBaseDatos();
                    }
                    //(<HTMLInputElement> document.getElementById("opcion")).value = "subirFoto";
                    //(<HTMLInputElement> document.getElementById("btnPrincipal")).value = "Agregar";
                    //(<HTMLInputElement> document.getElementById("legajo")).disabled = false;
                }
            };
        };
        Manejadora.VerificarExistencia = function () {
        };
        Manejadora.MostrarPerrosBaseDatos = function () {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './BACKEND/traer_bd.php', true);
            xhr.setRequestHeader("enctype", "multipart/form-data");
            xhr.send();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("divPerros").innerHTML = xhr.responseText;
                }
            };
        };
        return Manejadora;
    }());
    PrimerParcial.Manejadora = Manejadora;
})(PrimerParcial || (PrimerParcial = {}));
