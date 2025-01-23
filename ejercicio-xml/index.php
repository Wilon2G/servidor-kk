<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>XML Ejercicio</title>
</head>
<body>
    <?php
    
    include "./utils.php";

    if (isset($_POST["openEventForm"])) {
        newEventForm();
    }
    else {
        newEventButton();
    }
    

    if (isset($_POST["newEvent"])) {
        createNewEvent($_POST["title"],$_POST["buyLink"],$_POST["calification"],$_POST["genre"],$_POST["duration"],$_POST["sinopsis"],$_POST["trailLink"],$_POST["caratula"]);
    }

    if (isset($_POST["deleteEvent"])) {
        deleteEvent($_POST["eventId"]);
    }

    if (isset($_POST["editDates"])) {
        header("Location: ./datesManager.php?eventId=".$_POST["eventId"]);
    }

    if (isset($_POST["saveChanges"])) {
        saveChanges($_POST["eventId"],$_POST["title"],$_POST["buyLink"],$_POST["calification"],$_POST["genre"],$_POST["duration"],$_POST["sinopsis"],$_POST["trailLink"]);
    }

    if (isset($_POST["edit"])) {
        //var_dump($_POST["eventId"]);
        showAll($_POST["eventId"]);
    }

    showAll("");

    ?>
</body>
</html>