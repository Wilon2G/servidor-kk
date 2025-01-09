<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome</h1>
    <?php
    include_once "./clases/book.php";
    require_once "./utils.php";

    print ("<form action=\"#\" method=\"POST\">
        
        <input type=\"submit\" name=\"insertBook\" value=\"Insert book\" />

        <input type=\"submit\" name=\"rentBook\" value=\"Rent book\" />

        <input type=\"submit\" name=\"returnBook\" value=\"Return book\" />

        <input type=\"submit\" name=\"deleteBook\" value=\"Delete book\" />

        <input type=\"submit\" name=\"seeBook\" value=\"See my books\" />

        </form><br><br>");

    if (isset($_POST["rentBook"])) {
        showBooks();
        if (isset($_POST["chosenBook"])) {
            //var_dump($_POST["chosenBook"]);
            $chosenBook=getBook($_POST["chosenBook"]);

            print("You have chosen: ".$chosenBook["title"]."<br>");
            print("By: ".$chosenBook["author"]);
            print("<form action=\"#\" method=\"POST\">
            <input type=\"hidden\" name=\"rentBook\" value=\"Rent book\" />
            <input type=\"hidden\" name=\"bookId\" value=\"".$_POST["chosenBook"]."\" />
            <input type=\"submit\" name=\"confirmRent\" value=\"confirm\"/>
            </form>
            ");
        }
        if (isset($_POST["confirmRent"])) {
            $chosenBook=getBook($_POST["bookId"]);
            var_dump($chosenBook);
        }
    }

    if (isset($_POST["insertBook"])) {
        print ("<form action=\"#\" method=\"POST\">
        <lable>
            ISBN:
            <input type=\"text\" name=\"isbn\" placeholder=\"xxx-x-xx-xxxx\" required ></input>
        </lable>
        <lable>
            Title:
            <input type=\"text\" name=\"title\" placeholder=\"...\" required ></input>
        </lable>
        <lable>
            Author:
            <input type=\"text\" name=\"author\" placeholder=\"...\" required ></input>
        </lable>
        <lable>
            Stock:
            <input type=\"number\" name=\"stock\" placeholder=\"...\" required ></input>
        </lable>
        <lable>
            Price:
            <input type=\"number\" name=\"price\" placeholder=\"...\" required ></input>
        </lable>

        <input type=\"hidden\" name=\"insertBook\" value=\"\" />
        <input type=\"submit\" name=\"newBook\" value=\"Insert book\" />

        </form><br><br>");
        if (isset($_POST["newBook"])) {
            $newBook= new Book($_POST["isbn"],$_POST["title"],$_POST["author"],$_POST["stock"],$_POST["price"]);
            $message=$newBook->addBook();
            print("<p>".$message."</p>");
        }
    }

    ?>

</body>

</html>