<?php
abstract class Figura{
    private $color;
    private $vertex;

    abstract  function draw();
    abstract function getColor();
    abstract function setColor($color);
    abstract function getVertex();
    
}