"use strict";
var Entidades;
(function (Entidades) {
    var Mascota = /** @class */ (function () {
        function Mascota(tamaño, edad, precio) {
            this.tamaño = tamaño;
            this.edad = edad;
            this.precio = precio;
        }
        Mascota.prototype.ToString = function () {
            return "\"tamano\":\"" + this.tamaño + "\",\"edad\":" + this.edad + ",\"precio\":\"" + this.precio + "\"";
        };
        return Mascota;
    }());
    Entidades.Mascota = Mascota;
})(Entidades || (Entidades = {}));
//# sourceMappingURL=Mascota.js.map