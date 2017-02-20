<?PHP
    include 'Silverjack-Library.php';
    
    function adapt($rawState){
       // var_dump($rawState);
        return $rawState;
    }
    
    $playerImageLookup=array(
        '1'=>'1.jpeg',
        '2'=>'2.jpeg',
        '3'=>'3.jpeg',
        '4'=>'4.jpg');
    function getPlayerImagePath($img){
        global $playerImageLookup;
        return $playerImageLookup[$img];
    }
    function getCardImagePath($card){
        $path="";
        switch(substr($card,0,1)){
            case "C":
                $suit="clubs";
                break;
            case "D":
                $suit="diamonds";
                break;
            case "H":
                $suit="hearts";
                break;
            case "S":
                $suit="spades";
                break;
            default:
                return "img/cards/card_back.png";
        }
        $number=substr($card,1);
        return "img/cards/$suit/$number.png";
    }

    $DISPLAY_DEBUG=false;
    function displayDebugInfo($state){
        global $DISPLAY_DEBUG;
        if($DISPLAY_DEBUG){
            $result = json_encode($state);
            echo "<script>
            var str=JSON.stringify($result,null,2);
            window.alert(str)</script>";
        }
    }
    
    function isWinner($state,$playerIdx){
        if(in_array($playerIdx,$state['winners'])){
                return true;
            }else{
                return false;
            }
    }
    function displayCard($card){
        $src=getCardImagePath($card);
        echo "<img src='$src'/>";
    }
    
    function displayHand($hand){
        foreach($hand as $card){
            displayCard($card);
        }
    }
    
    function displayImageColumn($state){
        echo "<div class='ImageColumn'>";
        for($playerIdx=0;$playerIdx<sizeof($state['players']);$playerIdx++){
            $div="<div class='ImageData Debug ";
            $isWinner=isWinner($state,$playerIdx);
            if($isWinner){
                $div=$div."Winner";
            }else{
                $div=$div."Loser";
            }
            $div=$div."'>";
            echo $div;
            $path=getPlayerImagePath($state['players'][$playerIdx]['img']);
            echo "<img class='ImageData' src='$path'/>";
            //Image goes here.
            echo "</div>";
        }
        echo "</div>";
    }
    function displayScoreColumn($state){
        echo "<div class='ScoreColumn'>";
        for($playerIdx=0;$playerIdx<sizeof($state['players']);$playerIdx++){
            $isWinner=isWinner($state,$playerIdx);
            $score=$state['players'][$playerIdx]['score'];
            $div="<div class='ScoreData Debug ";
            if($isWinner){
                $div=$div."Winner";
            }else{
                $div=$div."Loser";
            }
            $div=$div."'>$score</div>";
            echo $div;
        }
        
        echo "</div>";
    }
    function displayCardsColumn($state){
        echo "<div class='CardsColumn'>";
        for($playerIdx=0;$playerIdx<sizeof($state['players']);$playerIdx++){
            $isWinner=isWinner($state,$playerIdx);
            $div="<div class='CardContainerData Debug ";
            if($isWinner){
                $div=$div."Winner";
            }else{
                $div=$div."Loser";
            }
            $div=$div."'>";
            echo $div;
            displayHand($state['players'][$playerIdx]['hand']);
            
            echo "</div>";
        }
        echo "</div>";
    }
    function displayNameColumn($state){
        echo "<div class='NameColumn'>";
        for($playerIdx=0;$playerIdx<sizeof($state['players']);$playerIdx++){
            $isWinner=isWinner($state,$playerIdx);
            $name=$state['players'][$playerIdx]['name'];
            $div="<div class='NameData Debug ";
            if($isWinner){
                $div=$div."Winner";
            }else{
                $div=$div."Loser";
            }
            $div=$div."'>$name</div>";
            echo $div;
        }
        
        echo "</div>";
        
    }
    function display(){
        $state=adapt(run());
        displayDebugInfo($state);
        echo "<div class='CardTable Debug'>";
        displayNameColumn($state);
        displayImageColumn($state);
        displayCardsColumn($state);
        displayScoreColumn($state);
        echo "</div>";
    }
?>