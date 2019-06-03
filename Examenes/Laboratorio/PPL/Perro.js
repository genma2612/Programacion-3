"use strict";
///<reference path="./Mascota.ts"/>
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
            return JSON.parse("\"nombre\":\"" + this.nombre + "\",\"raza\":" + this.raza + "," + this.ToString() + (",\"pathFoto\":\"" + this.pathFoto + "\""));
        };
        return Perro;
    }(Entidades.Mascota));
    Entidades.Perro = Perro;
})(Entidades || (Entidades = {}));
//# sourceMappingURL=Perro.js.map