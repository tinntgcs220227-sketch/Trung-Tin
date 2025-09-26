<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UFT-8">
        <title>Hello World php</title>
    </head>
    <body>
        <p><?php
            echo 'Hello World';?></p>
            <?php
            $myString = "This is a string";
            $myInt = 56;
            $myNull = Null;
            $myFloat = 6.23;

            echo "String data is: $myString <br />";
            echo "Integer data is : $myInt <br />";
            echo "Null data is : $myNull <br />";
            echo "Floating Point data is: $myFloat <br />";
            ?>
            
            <?php
            echo "echo world double<br />";
            print "print world double<br />";
            echo 'echo print single<br />';
            print 'print world single<br />';
            echo ("echo world brackets<br />");
            print ("print world brackets<br />");
            ?>

            <?php
            $txt1="Hello World!";
            $txt2="What a nice day!";
            echo $txt1 . "" . $txt2;
            ?>

            <?php
            $theDay = data("l");
            echo "The day is $theDay<br />";
            $theMonth = data("F");
            echo "The month is $theMonth<br />";
            $t = data("H");

            if ($t < 13){
                echo "Good morning to you!";
            }
            else{
                echo "Good afternoon to you";
            }
            ?>
    </body>
</html>