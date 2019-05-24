
namespace Empleados {

    export class Empleado{

        private _apellido:string;
        private _nombre:string;
        protected _legajo:number;
        protected _path_foto:string;


        public constructor(nombre:string,apellido:string,legajo:number,foto:string){
            this._nombre = nombre;
            this._apellido = apellido;
            this._legajo = legajo;
            this._path_foto = foto;
        }

        public get Nombre():string{
            return this._nombre;
        }

        public get Apellido():string{
            return this._apellido;
        }

        public get Legajo():number{
            return this._legajo;
        }

        public get Path_Foto():string{
            return this._path_foto;
        }

        public ToString():string{
            //return super.ToString() + " - " + this._legajo + " - " + this._sueldo;
            return this.Nombre + " - " + this.Apellido + " - " + this.Legajo + " - " + this.Path_Foto;
        }
    }

}