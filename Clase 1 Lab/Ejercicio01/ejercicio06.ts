var num : number = 5;

function cubo(numero : number) : number
{
    return numero * numero * numero;
}
var resultado : number = cubo(num);
console.log(`${num} al cubo es ${resultado}`);

var resultado2 = (num : number)=>num*num*num;
console.log(`Con flecha, ${num} al cubo es ${resultado}`);