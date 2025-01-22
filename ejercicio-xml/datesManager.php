<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit dates</title>
</head>
<body>
    <?php
    include "./utils.php";
    if (!isset($_GET["eventId"]) || empty($_GET["eventId"])) {
        header("Location:./");
    }

    $eventId=$_GET["eventId"];

    if (isset($_POST["saveDate"])) {
        $dateId=$_POST["dateId"];
        $newDate=$_POST["newDate"];
        $message=updateDate($eventId,$dateId,$newDate);
        print("<p>".$message."</p>");
    }
    if (isset($_POST["deleteDate"])) {
        $dateId=$_POST["dateId"];
        $newDate="";
        $message=updateDate($eventId,$dateId,$newDate);
        print("<p>".$message."</p>");
    }
    //var_dump($_GET["eventId"]);
    //var_dump(getTitleFromId($_GET["eventId"]));
    $allDates=(getDatesFromId($eventId));
    //var_dump($allDates[0]);
    foreach ($allDates[0] as $date) {

        print("<form action=\"#\" method=\"POST\">");
        //var_dump($date[0]);
            print("<lable>Día: <input type=\"text\" name=\"newDate\" value=\"".$date[0]["value"]."\" /></lable>
            <input type=\"hidden\" name=\"dateId\" value=\"".$date[0]["value"]."\" />
            <input type=\"submit\" name=\"saveDate\" value=\"Confirmar\" />
            <input type=\"submit\" name=\"deleteDate\" value=\"Eliminar\" />
            ");
        print("</form>");

        
        foreach ($date->sesiones->sala as $sesion ) {
            print("<form action=\"#\" method=\"POST\" >");
            print("<lable>
            Sala: <input type=\"text\" value=\"".$sesion["value"]."\" />
            </lable>
            ");
            print("<lable>
            Horas: <input type=\"text\" value=\"".trim((string)$sesion)."\" />
            </lable><input type=\"submit\" name=\"\" value=\"confirmar\">
            ");
            print("</form>");
        }
    }

    ?>
</body>
</html>