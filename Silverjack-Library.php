<?php
    /*function Run(){
        Return an object that can be displayed by the display routines.
        *Should contain:
        *Each Player
        *   Their Name
        *   Their Hand
        *      Each Card
        *   Whether they won or lost
        *   (Optional) The sum of their hand.
        
    }*/
    /*
    $tempHand = array();
    $suits = "cdhs";
    
    for($i = rand(4, 6); $i >= 0; $i--)
    {
        $tempCard = "";
        $tempCard = $suits[rand(0, strlen($suits) - 1)] . rand(1, 13);
        echo $tempCard . "<br>";
    }
    $temp = array('DL', 'DR', 'PL', 'PR');
    $assocCar["wheels"] = $temp;
    echo $assocCar["wheels"][3];
    // var_dump($assocCar);
    
    $temp = array("1" => array());
    array_push($temp["1"], "5");
    echo $temp["1"][0];
    */
    
    function newGame()
    {
        global $players, $scores, $hands, $suits;
        resetGame();
        
        //Puts cards in players hands and finds the total score for every player
        for($x = 0; $x < sizeof($players); $x++) //Runs through every player
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
                        if($hands[$players[$x]][$z] == $holeCard)
                            $repeat = true;
                    }
                } while($repeat == true);
                
                $scores[$players[$x]] += $cardValue; //Adds current card value to a players total
                array_push($hands[$players[$x]], $holeCard); //Pushes the currect card to a players hand
            }
        }
    }
    function resetGame()
    {
        global $scores, $hands, $players;
        $scores = array("Hannah" => 0, "John" => 0, "Alex" => 0, "Pam" => 0);
        $hands = array($players[0] => array(), $players[1] => array(), $players[2] => array(), $players[3] => array());
    }
    
    //Variables and Arrays
    $suits = "cdhs";
    $state=array( //List
        "Players"=>array( //Object
            "Name"=>"Hanna",
            "Score"=>0
            ),
        ),
        "Winners"=>array(1,2);
        );
        
    
    for($i=0;$i<sizeof($state);$i++){
        $player=$state[$i];
        
    }
    foreach($state as $mcmkdn){
        echo $player["Name"];
        echo $player["Score"];
    }    
    $players = array("Hannah", "John", "Alex", "Johna The Impaler");
    $scores = array("Hannah" => 0, "John" => 0, "Alex" => 0, "Johna The Impaler" => 0);
    $hands = array($players[0] => array(), $players[1] => array(), $players[2] => array(), $players[3] => array());
    
    newGame();
    
    for($i = 0; $i < sizeof($players); $i++)
    {
        echo $players[$i] . "___";
        for($x = 0; $x < sizeof($hands[$players[$i]]); $x++)
        {
            echo $hands[$players[$i]][$x];
            echo " ";
        }
        echo "___Total: " . $scores[$players[$i]];
        echo "<br><br>";
    }
?>