/// <reference path="./empleado.ts" />

let E1 = new Empleados.Empleado("Manuel", "Gonzalez", "Masculino", 38000000, 117223, 90000);

console.log(E1.Hablar("Castellano"));
console.log(E1.Legajo + " - " + E1.Sueldo);
console.log(E1.ToString());
