<?php
class Rectangulo extends FiguraGeometrica
{
    private $_ladoUno;
    private $_ladoDos;

    public function __construct($l1, $l2)
	{
        parent::__construct();
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        $this->CalcularDatos();
    }

    function CalcularDatos()
    {
        $this->_perimetro = 2 * ($this->_ladoUno + $this->_ladoDos);
        $this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }

    function Dibujar()
    {
        $cadena = ""; //Agregar etiquetas de colores
        for($i=$this->_ladoDos; $i>0; $i--)
        {
            for($j=$this->_ladoUno; $j>0; $j--)
            {
                $cadena = $cadena . "*";
            }
            $cadena = $cadena . "<br>";
        }
        return $cadena;
    }

    function ToString()
    {
        return " Lado 1: " . $this->_ladoUno
        . " Lado 2: " . $this->_ladoDos . " " . parent::ToString() . "<br>" . $this->Dibujar();
    }

}