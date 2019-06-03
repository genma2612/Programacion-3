///<reference path="./Mascota.ts"/>

namespace Entidades
{
    export class Perro extends Mascota
    {
        public nombre:string;
        public raza:string;
        public pathFoto:string;

        public constructor(tamaño:string,edad:number,precio:number,nombre:string,raza:string,pathFoto:string)
        {
            super(tamaño,edad,precio);
            this.nombre=nombre;
            this.raza=raza;
            this.pathFoto=pathFoto;
        }

        public ToJSON():any
        {
            return JSON.parse('{"nombre":"' + this.nombre + '","raza":"' + this.raza + '",' + this.ToString() + ',"pathFoto":"' + this.pathFoto +'"}');
        }
    }
}