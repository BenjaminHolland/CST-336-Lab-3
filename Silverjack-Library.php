<?php
    function newState()
    {
        return array(
            "players" => array(
                array("name" => "Hannah", "score" => 0, "hand" => array()),
                array("name" => "John", "score" => 0, "hand" => array()),
                array("name" => "Alex", "score" => 0, "hand" => array()),
                array("name" => "Johna The Impaler", "score" => 0, "hand" => array())
            ),
            "winners" => array()
        );
    }
    function dealCards($state) //Puts cards in players hands and finds the total score for every player
    {
        for($player = 0; $player < sizeof($state["players"]); $player++) //Runs through every player
        {
            $suits = "CDHS";
            for($i = 0; $i < rand(4, 6); $i++) //Runs the number of cards every person will recieve
            {
                //Checks to make sure there are so duplicate cards in a players hand
                do{
                    $repeat = false;
                    $cardValue = rand(1, 13);
                    $holeCard = $suits[rand(0, strlen($suits) - 1)] . $cardValue;
                    for($card = 0; $card < $i; $card++)
                    {
                        if($state["players"][$player]["hand"][$card] == $holeCard)
                            $repeat = true;
                    }
                } while($repeat == true);
                
                $state["players"][$player]["score"] += $cardValue; //Adds current card value to a players total
                array_push($state["players"][$player]["hand"], $holeCard); //Pushes the currect card to a players hand
            }
        }
        return $state;
    }
    function findWinners($state)
    {
        $maxScore = 0;
        for($person = 0; $person < sizeof($state["players"]); $person++) //Finds the largest score
        {
            if($state["players"][$person]["score"] >= $maxScore)
                $maxScore = $state["players"][$person]["score"];
        }
        for($person = 0; $person < sizeof($state["players"]); $person++) //Finds who has a score matching the largest score
        {
            if($state["players"][$person]["score"] == $maxScore)
                array_push($state["winners"], $person);
        }
        return $state;
    }
    function run() 
    {
        $state = newState();
        $state = dealCards($state);
        $state = findWinners($state);
        return $state;
    }
?>
