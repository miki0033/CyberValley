<?php
    //VARIABILI
    $titolo="Informatica";
    $testo="questo è il corso di informatica dell'istituto cyber valley";
    $img=["img/img_infor.jpg",
        "img/img_chimica.jpg",
        "img/img_meccanica.jpg"/*,
"img/logo.png"*/];
    
?>   

<?php
$title="$titolo - Cyber Valley";
require_once('header.php');

?>

<div class="content">
    
    <div class="row">
        
            <?php
            for($i=0;$i<count($img);$i++){
            echo '<div class="corsoimg col overflow-hidden" style="background-image: url(&quot;'.$img[$i].'&quot;); background-size: 95%;">';   
            
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

