<?php
    include 'Silverjack-Library.php';

    run();
    
    //Test output
    for($i = 0; $i < sizeof($state["players"]); $i++)
    {
        echo $state["players"][$i]["name"] . "___";
        for($x = 0; $x < sizeof($state["players"][$i]["hand"]); $x++)
        {
            echo $state["players"][$i]["hand"][$x];
            echo " ";
        }
        echo "___Total: " . $state["players"][$i]["score"];
        echo "<br><br>";
    }
    var_dump($state["winners"]);
?>