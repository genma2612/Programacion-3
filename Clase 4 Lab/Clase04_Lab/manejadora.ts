namespace AJAX{

    export function Saludar():void
    {
        let xm = new XMLHttpRequest();
        xm.open("GET", "administrar.php", true);
        xm.send();
        xm.onreadystatechange = () => 
        {
            if (xm.readyState == 4 && xm.status == 200) 
            {
                console.log(xm.responseText);
                (<HTMLDivElement> document.getElementById("div_mostrar")).innerHTML = "Respuesta: " + xm.responseText;
                alert(xm.responseText);
            }
        }
    }

    export function Ingresar():void
    {
        let accion = 2;
        let xm = new XMLHttpRequest();
        let nombre = (<HTMLTextAreaElement> document.getElementById("nombre")).value;
        if(!Verificar(nombre))
        {
            xm.open("GET", "administrar.php?accion=" + accion + "&cadena=" + nombre, true);
            xm.send();
            xm.onreadystatechange = () => 
            {
                if (xm.readyState == 4 && xm.status == 200) 
                {
                    if(xm.responseText == "1")
                    {
                        Mostrar();
                    }
                    else
                        alert("Error al escribir el archivo");
                    console.log(xm.responseText);
                    //(<HTMLDivElement> document.getElementById("div_mostrar")).innerHTML = "Respuesta: " + xm.responseText;
                    //alert(xm.responseText);
                }
            }
        }
        else
            alert("El nombre ya existe");

    }

    export function Mostrar():void
    {
        let xm = new XMLHttpRequest();
        xm.open("GET", "administrar.php?accion=3", true);
        xm.send();
        xm.onreadystatechange = () => 
        {
            if (xm.readyState == 4 && xm.status == 200) 
            {
                console.log(xm.responseText);
                (<HTMLDivElement> document.getElementById("div_mostrar")).innerHTML = xm.responseText;
            }
        }
    }

    export function Verificar(nombre):boolean
    {
        let xm = new XMLHttpRequest();
        xm.open("GET", "administrar.php?accion=4&cadena=" + nombre, true);
        xm.send();
        xm.onreadystatechange = () => 
        {
            if (xm.readyState == 4 && xm.status == 200) 
            {
                if(xm.responseText == "1")
                {
                    return true;
                }
            }
        }
        return false;
    }
    
}