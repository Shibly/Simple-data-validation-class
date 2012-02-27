<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        include_once 'Validator.php';



// check if the number is between 10,30

        if (!Validator::Number(5, 50, 20)) {
            echo "The number is not between 20 and 50";
        } else {
            echo "Yes, the number is between 20 and 50";
        }

        echo "<br/>";
// email validation

        if (!Validator::Email("shibly.phy@gmail.com")) {
            echo "Invalid email address";
        } else {
            echo "Email is valid ";
        }


        echo "<br/>";
// Email address validation with exception

        if (!Validator::Email("Shibly.phy@test.com", array("test.com"))) {
            echo "test.com is not allowed";
        }

        echo "<br/>";

        if (!Validator::Alpha('asd123')) {
            echo "this is not a alpha numeric string";
        } else {
            echo "This is a alpha numeric string";
        }


        echo "<br/>";

        if (!Validator::Number("123")) {
            echo "Not a number";
        } else {
            echo "Is a number";
        }

        echo "<br/>";

        if (!Validator::Ip("192.164.1.3")) {
            echo "This is not a valid IP address";
        } else {
            echo "This is a valid Ip Address";
        }
        ?>


    </body>
</html>
