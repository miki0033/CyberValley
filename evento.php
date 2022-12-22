<?php
    //VARIABILI
    $titolo="Evento";
    $testo="Grandissimo evento di Cyber Valley";
    $img=["img/logo.png"];
    
?>   

<?php
$title="$titolo - Cyber Valley";
require_once('header.php');

?>

<div class="content">
    
    <div class="row">
        
            <?php
            for($i=0;$i<count($img);$i++){
            
            echo '<div class="eventoimg col overflow-hidden" style="background-image: url(&quot;'.$img[$i].'&quot;); background-size: contain;">';   
                
            echo '</div>';

            if($i>3) break;
            
            }
            ?>

        
        <h5><?=$titolo?></h5>
        <p><?=$testo?></p>
    </div>
    
</div>
<div class="clear">
    <br>
</div>

<?php
require_once('footer.php');

?>

