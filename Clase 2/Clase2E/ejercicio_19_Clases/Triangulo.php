<?php
class Triangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;

    public function __construct($b, $h)
	{
        parent::__construct();
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        $this->CalcularDatos();
    }

    function CalcularDatos()
    {
        $this->_perimetro = $this->_base + (2 * $this->_altura);
        $this->_superficie = $this->_altura * $this->_base;
    }

    function Dibujar()
    {
        return " ";
    }

    function ToString()
    {
        return parent::ToString() . " Altura: " . $this->_altura
        . " Base: " . $this->_base . "<br>" . $this->Dibujar();
    }
    
}