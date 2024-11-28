<?php
class Customer{
    private $id;
    private $name;
    private $surnames;
    private $email;

    public function __construct($id,$name,$surnames,$email){
        $this->id=$id;
        $this->name=$name;
        $this->surnames=$surnames;
        $this->email=$email;
    }

    public function __tostring(){
        return "<table style=\"border:1px solid black; margin-top:5px; border-collapse: collapse;\">

        <thead><tr style=\"background-color:\"><th>Customer: ".$this->name."</th></tr></thead>
        
        <tr style=\"background-color:cornsilk\"><td>ID: </td><td >".$this->id."</td></tr>

        <tr style=\"background-color:rgb(255,248,178)\"><td>Surnames: </td><td >".$this->surnames."</td></tr>

        <tr style=\"background-color:cornsilk\"><td>Email: </td><td >".$this->email."</td></tr>
       
        </table>";
    }
}

// return "<div style=\"border:1px solid black; margin-top:10px; width: fit-content\">

//         <h3 style=\"border:2px solid black; margin-top:0; margin-bottom:5px; padding:2%\">Customer: ".$this->name."</h3>
//         <ul style=\"padding:0px 20px; margin-top:2px\">
//         <li>ID: ".$this->id."</li>

//         <li>Surnames: ".$this->surnames."</li>

//         <li>Email: ".$this->email."</li>
//         </ul>
//         </div>";