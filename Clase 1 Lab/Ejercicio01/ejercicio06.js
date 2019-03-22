var num = 5;
function cubo(numero) {
    return numero * numero * numero;
}
var resultado = cubo(num);
console.log(num + " al cubo es " + resultado);
var num2 = function (num) { return num * num * num; };
console.log("Con flecha, " + num + " al cubo es " + resultado);
