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
    <?PHP
    require "../clases/Customer.php";
    require "./utils.php";


    
    if (!isset($_POST["custTypeSubmit"])) {
        print("<h2>Are you a premium or basic customer?</h2>");
        print ("<form action=\"#\" method=\"POST\">
        <lable>
            <input type=\"radio\" name=\"customerType\" value=\"premium\" cheked> Premium </input>
            <input type=\"radio\" name=\"customerType\" value=\"basic\" > Basic </input>
        </lable>
        <input type=\"submit\" name=\"custTypeSubmit\" value=\"Confirm\" />
        </form>
        ");
    }
    else {
        $type=$_POST["customerType"];
        print("Login for ".$type." customer: ");
        print ("<form action=\"#\" method=\"POST\">
        <lable>Username:
            <input type=\"text\" name=\"userName\" required />
        </lable>
        <br/>
        <lable>Password:
            <input type=\"password\" name=\"password\" required />
        </lable>
        <br/>
        <lable>Email:
            <input type=\"email\" name=\"email\" required />
        </lable>
        <br/>
        <input type=\"hidden\" name=\"customerType\" value=\"".$type."\" />
        <input type=\"hidden\" name=\"custTypeSubmit\" value=\"Confirm\" />
        <input type=\"submit\" name=\"loginAttempt\" value=\"Confirm\" />
        ");

        if (isset($_POST["loginAttempt"])) {
            $customer = new Customer($_POST["userName"],$_POST["password"],$_POST["email"]);
            checkCustomer($customer);
        }
        
    }
    

    ?>
</body>

</html>