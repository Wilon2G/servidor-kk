<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>

<body>
    <header>
        <h1>Welcome</h1>
    </header>
    <h2>Are you a premium or basic customer?</h2>
    <?PHP
    
    if (!isset($_POST["custTypeSubmit"])) {
        print ("<form action=\"#\" method=\"POST\">
        <lable>
            <input type=\"radio\" name=\"customerType\" value=\"premium\" cheked> Premium </input>
            <input type=\"radio\" name=\"customerType\" value=\"basic\" > Basic </input>
            <input type=\"submit\" name=\"custTypeSubmit\" value=\"Confirm\" />
        </lable>
        ");
    }
    else {
        $type=$_POST["customerType"];

        
    }
    





    ?>
</body>

</html>