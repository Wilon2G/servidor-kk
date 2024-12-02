<?php

class Cuadrado extends Figura
{
    private $color;
    private $vertex;
    private $side;
    public function __construct($side, $color)
    {
        $this->color = $color;
        $this->vertex = 4;
        $this->side = $side;

    }
    public function draw()
    {
        $img = imagecreatetruecolor($this->side, $this->side);
        imagecolorallocate($img,$this->color[0],$this->color[1],$this->color[2]);


        ob_start();
        imagejpeg($img);
        $temp = ob_get_clean();
        imagedestroy($img);
        
        //print ("<img src=\"data:image/jpeg;base64," . base64_encode($temp) . "\" />");
        return "<img src=\"data:image/jpeg;base64," . base64_encode($temp) . "\" />";

    }
    public function __tostring(){

        return ("<div style=\"text-align:center\">
        ".$this->draw()."
        <br>
        ".$this->getMessage()."
        </div>");
    }
    public function getMessage(){
        return "Soy un Cuadrado de lado: ".$this->side;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function getVertex()
    {
        return $this->vertex;
    }
    public function getSide()
    {
        return $this->side;
    }

}

