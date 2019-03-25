<?php
Abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
	{
        $this->_color = "negro";
    }
    
    function GetColor()
    {
        return $this->_color;
    }

    function SetColor($color)
    {
        $this->_color = $color;
    }

    public abstract function Dibujar();

    protected abstract function CalcularDatos();

    function toString()
    {
        return "Color: " . $this->GetColor() . " Perimetro: " . $this->_perimetro . " Superficie: " . $this->_superficie;
    }
}