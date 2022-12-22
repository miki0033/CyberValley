<?php
    //VARIABILI
    $title="Eventi - Cyber Valley";
    $titoloevento=   ["Evento1",
                    "Evento2",
                    "Festa di natale"];
    $img=["img/img_infor.jpg",
        "img/img_chimica.jpg",
        "img/logo_cybervalley.png"];
    $textevento=["Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt consectetur facere consequuntur autem quae sint, accusamus veritatis nihil laborum qui accusantium totam dolorem dolor vero commodi officia dicta doloremque iusto!",
    "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt consectetur facere consequuntur autem quae sint, accusamus veritatis nihil laborum qui accusantium totam dolorem dolor vero commodi officia dicta doloremque iusto!",
    "Evento esclusivo della scuola di formazione Cybervalley, festa di natale per gli studenti iscritti"
    
    ];
?>   

<?php
require_once('header.php');

?>

<div class="content listacorsi">
    <h5>Corsi</h5>
    <?php
    for($i=0;$i<count($titoloevento);$i++){
        echo '<hr>
        <div class="row el_listacorsi">
            <h6>'.$titoloevento[$i].'</h6>
            <div class="col-3 overflow-hidden eventoimg" style="background-image: url(&quot;'.$img[$i].'&quot;)">
                    
            </div>
                <div class="col text-justify">
                    <p>'.$textevento[$i].'</p>
                    <a href="#" target="_blank">Vai al evento <i class="bi bi-arrow-right"></i></a>
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

