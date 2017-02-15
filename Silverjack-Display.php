<?PHP
    include 'Silverjack-Library.php';
    function adapt($rawState){
       // var_dump($rawState);
        return $rawState;
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
    function displayPlayer($player,$isWinner){
        if($isWinner){
            echo "<div class='TableRow Winner'>"; 
        }else{
            echo "<div class='TableRow'>";
        }
        echo 
            "<div class='TableItem NameItem' column-header='Name'>".
            $player['name'].
            "</div>";
            
            $pad=6-sizeof($player['hand']);
            
        foreach($player['hand'] as $card){
            echo 
                "<div class='TableItem CardItem'>".
                "<img src='".getCardImagePath($card)."'/>".
                "</div>";
        }
        for($pad;$pad>=0;$pad--){
            "<div class='TableItem CardItem'>".
                "<img src='"."img/cards/card_back.png"."'/>".
                "</div>";
        }
        
        echo 
            "<div class='TableItem ScoreItem' column-header='Name'>".
            $player['score'].
            "</div>";
        
        echo "</div>";
    }
    function display(){
        $state=adapt(run());
        echo "<div class='Table'>";
        for($playerIdx=0;$playerIdx<4;$playerIdx++){
            
            $player=$state['players'][$playerIdx];
            
            //Detect winner.
            $isWinner=false;
            for($winnerIdx=0;$winnerIdx<sizeof($state['winners']);$winnerIdx++){
                if($state['winners'][$winnerIdx]==$playerIdx){
                    $isWinner=true;
                    break;
                }
            }
            
            displayPlayer($player,$isWinner);
            
        }
        echo "</div>";
    }
?>