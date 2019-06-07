namespace Empleados {

    export abstract class Persona{
        private _apellido:string;
        private _dni:number;
        private _nombre:string;
        private _sexo:string;

        public constructor(nombre:string,apellido:string,sexo:string,dni:number){
            this._apellido = apellido;
            this._nombre = nombre;
            this._sexo = sexo;
            this._dni = dni;
        }

        public get Apellido():string{
            return this._apellido;
        }

        public get Nombre():string{
            return this._nombre;
        }

        public get Dni():number{
            return this._dni;
        }

        public get Sexo():string{
            return this._sexo;
        }

        public abstract Hablar(idioma:string):string;

        public ToString():string{
            //return this._nombre + " - " + this._apellido + " - " + this._sexo + " - " + this._dni;
            return this.Nombre + " - " + this.Apellido + " - " + this.Sexo + " - " + this.Dni;
        }
    }

}