<?php

//https://www.artstation.com/artwork/orc-32c0b935-867f-4e1e-ab0c-27a063e228af
    function newState()
    {
        return array(
            "players" => array(
                array("name" => "Hannah", "score" => 0, "hand" => array(),"img"=>'3'),
                array("name" => "John", "score" => 0, "hand" => array(),"img"=>'1'),
                array("name" => "Alex", "score" => 0, "hand" => array(),"img"=>'2'),
                array("name" => "Johna The Impaler", "score" => 0, "hand" => array(),"img"=>'4')
            ),
            "winners" => array()
        );
    }
    function dealCards($state) //Puts cards in players hands and finds the total score for every player
    {
        for($player = 0; $player < sizeof($state["players"]); $player++) //Runs through every player
        {
            $suits = "CDHS";
            while($state["players"][$player]["score"] < 42 && sizeof($state["players"][$player]["hand"]) < 6)
            {
                //Checks to make sure there are no duplicate cards in players hands
                do{
                    $repeat = false;
                    $cardValue = rand(1, 13);
                    $holeCard = $suits[rand(0, strlen($suits) - 1)] . $cardValue;
                    for($currentPlayer = 0; $currentPlayer < sizeof($state["players"]); $currentPlayer++)
                    {
                        for($card = 0; $card < sizeof($state["players"][$currentPlayer]["hand"]); $card++)
                        {
                            if($state["players"][$currentPlayer]["hand"][$card] == $holeCard)
                                $repeat = true;
                        }
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
        $bestScore = 0;
        for($person = 0; $person < sizeof($state["players"]); $person++) //Finds the largest score under or equal to 42
        {
            if($state["players"][$person]["score"] >= $bestScore && $state["players"][$person]["score"] <= 42)
                $bestScore = $state["players"][$person]["score"];
        }
        for($person = 0; $person < sizeof($state["players"]); $person++) //Finds who has a score matching the best score
        {
            if($state["players"][$person]["score"] == $bestScore)
                array_push($state["winners"], $person);
        }
        return $state;
    }
    function randPlayers($state)
    {
        //Same effect, but this is shorter and fills our quota of "Array" operations.
        shuffle($state['players']);
        return $state;
        /*
        for($player = 0; $player < sizeof($state["players"]); $player++)
        {
            $randNewPosition = rand(0, 3);
            $temp = $state["players"][$player];
            $state["players"][$player] = $state["players"][$randNewPosition];
            $state["players"][$randNewPosition] = $temp;
        }
        return $state;
        */
    }
    function run() 
    {
        $state = newState();
        $state = dealCards($state);
        $state = randPlayers($state);
        $state = findWinners($state);
        

        return $state;
    }
?>
