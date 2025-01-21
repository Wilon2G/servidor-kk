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
    //var_dump($_GET["eventId"]);
    //var_dump(getTitleFromId($_GET["eventId"]));
    $allDates=(getDatesFromId($_GET["eventId"]));
    var_dump($allDates[0]);
    foreach ($allDates[0] as $date) {
        print("<form action=\"#\" method=\"POST\">");
        //var_dump($date[0]);
            print("<input type=\"text\" value=\"".$date[0]["value"]."\" />");
        print("</form>");

        
        foreach ($date->sesiones->sala as $sesion ) {
            print("<form action=\"#\" method=\"POST\" >");

            print("</form>");
            var_dump($sesion["value"]);
            var_dump((string)$sesion);

        }
    }

    ?>
</body>
</html>