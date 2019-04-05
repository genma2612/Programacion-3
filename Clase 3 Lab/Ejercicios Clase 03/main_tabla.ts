/// <reference path="./empleado.ts" />

    function GenerarEmpleado():void {
    let nombre : string = (<HTMLInputElement> document.getElementById("txtNombre")).value;
    let apellido : string = (<HTMLInputElement> document.getElementById("txtApellido")).value;
    let dni : number = parseInt((<HTMLInputElement> document.getElementById("txtDni")).value);
    let sexo : string = ((<HTMLInputElement> document.getElementById("cboSexo")).value).toString();
    let legajo : number = parseInt((<HTMLInputElement> document.getElementById("txtLegajo")).value);
    let sueldo : number = parseInt((<HTMLInputElement> document.getElementById("txtSueldo")).value);

    let empleado = new Empleados.Empleado(nombre, apellido,sexo,dni,legajo,sueldo);
    console.log(empleado.ToString());

    let frm = (<HTMLFormElement> document.getElementById("frmEmpleado"));
    frm.submit();
}
