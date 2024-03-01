<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <?php 
        $a = $b = $c = 12.78;
        $teacher = "Good morning students";
        $STU = "Good morning ma'am";

        echo "Teacher:$teacher.<br> Student:$STU";
        echo "Data types and variable value<br>";
        var_dump($b);

        #variable scope
        function outVarData() {
            //local scope
            $inside = 90;
            print $inside;
        }

        echo "<br>";
        outVarData();

        print "<h2> Next Topic </h2>";
        $xy = 20;
        $Xy = 40;
        echo $xy + $Xy;

        #double qoute vs single 
        $screen = "LCd";
        $Monitor = 'Lcd';

        $tyrt = true;
        var_dump($tyrt);

        echo 'Single qoutes: $Monitor <br>';
        echo "Double qoutes: $screen";

        // length of string checking
        // strlen($screen);

        // $empty = Null;
        // $empty = 123;
        // var_dump($empty);

        // echo "<br>";

        // echo "<b>Note here for Double and single qoute</b>";
        // $new1 = "Double";
        // $new2 = 'single <br>';
        // echo $new1;
        // echo  "Name of variable is: $new2";

        // function Car(){
        //     static $start = 200;
        //     static $stop = 120;
        //     echo $start; 
        // }

        $start = 200;
        $stop = 120;

        if ($start == $stop){
            echo "No car is not started";
        } elseif ($start != $stop) {
            echo "Car has been started!";
            // echo Car();
        } else {
            echo "Nothing happened!";
        }




        ?>
    </body>
</html>