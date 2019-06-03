namespace Entidades
{
    export class Mascota
    {
        public tamano:string;
        public edad:number;
        public precio:number;

        public constructor (tamaño:string,edad:number,precio:number)
        {
            this.tamano=tamaño;
            this.edad=edad;
            this.precio=precio;
        }

        public ToString():string
        {
            return '"tamano":"' + this.tamano + '","edad":"' + this.edad + '","precio":"' + this.precio + '"';
        }
    }
}