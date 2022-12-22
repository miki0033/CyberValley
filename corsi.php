<?php
    //VARIABILI
    $title="Corsi - Cyber Valley";
    $titolocorso=   ["Corso1",
                    "Corso2"];
    $img=["img/img_infor.jpg",
        "img/img_chimica.jpg"];
    $textcorso=["Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt consectetur facere consequuntur autem quae sint, accusamus veritatis nihil laborum qui accusantium totam dolorem dolor vero commodi officia dicta doloremque iusto!",
    "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt consectetur facere consequuntur autem quae sint, accusamus veritatis nihil laborum qui accusantium totam dolorem dolor vero commodi officia dicta doloremque iusto!"];
?>   

<?php
require_once('header.php');

?>

<div class="content listacorsi">
    <h5>Corsi</h5>
    <?php
    for($i=0;$i<count($titolocorso);$i++){
        echo '<hr>
        <div class="row el_listacorsi">
            <h6>'.$titolocorso[$i].'</h6>
            <div class="col-3 overflow-hidden imglist" style="background-image: url(&quot;'.$img[$i].'&quot;)">
                    
            </div>
                <div class="col text-justify">
                    <p>'.$textcorso[$i].'</p>
                    <a href="#" target="_blank">Vai al corso <i class="bi bi-arrow-right"></i></a>
                </div>
        </div>
    ';
    }
    
    ?>
</div>
<div class="clear">
    <br>
</div>

<?php
require_once('footer.php');

?>

