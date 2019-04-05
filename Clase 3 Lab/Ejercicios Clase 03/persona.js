var Empleados;
(function (Empleados) {
    var Persona = /** @class */ (function () {
        function Persona(nombre, apellido, sexo, dni) {
            this._apellido = apellido;
            this._nombre = nombre;
            this._sexo = sexo;
            this._dni = dni;
        }
        Object.defineProperty(Persona.prototype, "Apellido", {
            get: function () {
                return this._apellido;
            },
            enumerable: true,
            configurable: true
        });
        Object.defineProperty(Persona.prototype, "Nombre", {
            get: function () {
                return this._nombre;
            },
            enumerable: true,
            configurable: true
        });
        Object.defineProperty(Persona.prototype, "Dni", {
            get: function () {
                return this._dni;
            },
            enumerable: true,
            configurable: true
        });
        Object.defineProperty(Persona.prototype, "Sexo", {
            get: function () {
                return this._sexo;
            },
            enumerable: true,
            configurable: true
        });
        Persona.prototype.ToString = function () {
            //return this._nombre + " - " + this._apellido + " - " + this._sexo + " - " + this._dni;
            return this.Nombre + " - " + this.Apellido + " - " + this.Sexo + " - " + this.Dni;
        };
        return Persona;
    }());
    Empleados.Persona = Persona;
})(Empleados || (Empleados = {}));
