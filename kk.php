<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
print ("<form  action=\"" . $_SERVER['PHP_SELF'] . "?x=1\" method=\"POST\">");
print ("<lable>Name: <input type=\"text\" name=\"nombre\" maxlength=\"30\" minlength=\"1\" required ></lable>");
$fruits = ["orange", "apple", "banana", "tangerie"];
print ("<label>Fruits:");
foreach ($fruits as $fruit) {
    print ("<input type=\"checkbox\" value=\"" . $fruit . "\" name=\"fruits[]\" >" . $fruit . "</input>");
}
print("</label>");
print("<select name=\"consoles[]\" multiple>");
$consoles=["Nintendo","PlayStation","XBox"];
foreach($consoles as $con){
    print("<option value=\"".$con."\">".$con."</option>");
}
print("<input type=\"submit\" name=\"submit\" value=\"Send\">");

setcookie("name",$name,time()+60*60*24*1);

?>
    
</body>
</html>

