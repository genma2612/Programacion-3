/// <reference path="./persona.ts" />

namespace Empleados {

    export class Empleado extends Persona{

        protected _legajo:number;
        protected _sueldo:number;


        public constructor(nombre:string,apellido:string,sexo:string,dni:number,legajo:number,sueldo:number){
            super(nombre,apellido,sexo,dni)
            this._legajo = legajo;
            this._sueldo = sueldo;
        }

        public get Legajo():number{
            return this._legajo;
        }

        public get Sueldo():number{
            return this._sueldo;
        }

        public Hablar(idioma:string):string{
            return "El empleado habla " + idioma;
        }

        public ToString():string{
            //return super.ToString() + " - " + this._legajo + " - " + this._sueldo;
            return super.ToString() + " - " + this.Legajo + " - " + this.Sueldo;
        }
    }

}