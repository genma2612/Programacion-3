function Calcular():void {
    
    let N1 : number = parseInt((<HTMLInputElement> document.getElementById("txtN1")).value);
    let N2 : number = parseInt((<HTMLInputElement> document.getElementById("txtN2")).value);
    let Result : number = 0;
    // let signo : string = (<HTMLInputElement> document.getElementsByName("rdoSigno")).value; corregir

    switch (signo) {
        case "+":
            Result = N1 + N2;
            break;
        case "-":
            Result = N1 - N2;
            break;
        case "*":
            Result = N1 - N2;
            break;
        case "/":
            if(N2 != 0)
                Result = N1 + N2;
            else
                Result = 0;
            break;
        default:
            break;
    }



    (<HTMLInputElement> document.getElementById("txtResult")).value = Result.toString();
}