<?php
 function run() 
    {
        //Variables and Arrays
        $suits = "CDHS";
        $max = 0;
        $state = array(
            "players" => array(
                array(
                    "name" => "Hannah",
                    "score" => 0,
                    "hand" => array()
                ),
                array(
                    "name" => "John",
                    "score" => 0,
                    "hand" => array()
                ),
                array(
                    "name" => "Alex",
                    "score" => 0,
                    "hand" => array()
                ),
                array(
                    "name" => "Johna The Impaler",
                    "score" => 0,
                    "hand" => array()
                )
            ),
            "winners" => array()
        );
        
        //Puts cards in players hands and finds the total score for every player
        for($x = 0; $x < sizeof($state["players"]); $x++) //Runs through every player
        {
            for($y = 0; $y < rand(4, 6); $y++) //Runs the number of cards every person will recieve
            {
                //Checks to make sure there are so duplicate cards in a players hand
                do{
                    $repeat = false;
                    $cardValue = rand(1, 13);
                    $holeCard = $suits[rand(0, strlen($suits) - 1)] . $cardValue;
                    for($z = 0; $z < $y; $z++)
                    {
                        if($state["players"][$x]["hand"][$z] == $holeCard)
                            $repeat = true;
                    }
                } while($repeat == true);
                
                $state["players"][$x]["score"] += $cardValue; //Adds current card value to a players total
                array_push($state["players"][$x]["hand"], $holeCard); //Pushes the currect card to a players hand
            }
        }
        
        //Checking winners
        for($i = 0; $i < sizeof($state["players"]); $i++)
        {
            if($state["players"][$i]["score"] >= $max)
                $max = $state["players"][$i]["score"];
        }
        for($i = 0; $i < sizeof($state["players"]); $i++)
        {
            if($state["players"][$i]["score"] == $max)
                array_push($state["winners"], $i);
        }
        return $state;
    }
?>
