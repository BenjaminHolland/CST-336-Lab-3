<?PHP
    include 'Silverjack-Library.php';
    function adapt($rawState){
        $state=array(
            'players'=>array(
                array(
                    'name'=>'Ben',
                    'hand'=>array('H1',"H2","HQ","HK"),
                    'score'=>0
                    ),
                array(
                    'name'=>'Abraham',
                    'hand'=>array('H1',"H2","HQ","HK"),
                    'score'=>0
                    ),
                array(
                    'name'=>'A Cat',
                    'hand'=>array('H1',"H2","HQ","HK"),
                    'score'=>0
                    ),
                array(
                    'name'=>'Breenstar The Dolphin Boy',
                    'hand'=>array('H1',"H2","HQ","HK"),
                    'score'=>0
                    )),
            'winners'=>array(1,2,3,4)
            );   
        return $state;
            
    }
    function display(){
        $state=adapt(run());
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
            
            if($isWinner){
                echo '<tr class="player winner">';
            }else{
               echo '<tr class="player">'; 
            }
            
            echo '<td class="playerPhoto item"></td>';
            echo '<td class="playerName item">'.$player['name']."</td>";
            
            foreach($player['hand'] as $card){
                    echo "<td class='card item'>$card</td>";
            }
            
            echo '</tr>';
            
        }
    }
?>