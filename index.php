<?php
    $title="HOMEPAGE - Cyber Valley";
    
    $eventoimg=["img/img_infor.jpg", "img/img_infor.jpg", "img/img_infor.jpg"];
    $eventid=["123","123","123"];
?>
<?php require_once('header.php'); ?>

<div class="content">
    <div class="descrizione">
        <h1>Chi Siamo</h1>
        <p>Cyber Valley è un istituto di alta formazione che offre corsi avanzati nell'ambito dell'informatica, della chimica e della meccanica.<br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
        Dicta voluptates deleniti magnam ratione voluptatum eligendi odio incidunt. <br>
        Est eaque illum vel ipsam autem modi, perferendis culpa quo accusantium ad eligendi.</p>
    </div>

    <div class="corsi container text-center">
        <div class="row">
            <h2>Offriamo corsi negli ambiti:</h2>
        </div>
        <div class="row">
            <div class="corso col">
                <a href="corsi.php?amb=INF">
                    <img src="img/img_infor.jpg" alt="informatica" >
                    <h2>Informatica</h2>
                </a>
            </div>
            <div class="corso col">
            <a href="corsi.php?amb=CHI">
                <img src="img/img_chimica.jpg" alt="chimica">
                <h2>Chimica</h2>
            </a>
            </div>
            <div class="corso col">
            <a href="corsi.php?amb=MEC">
                <img src="img/img_meccanica.jpg" alt="meccanica">
                <h2>Meccanica</h2>
            </a>
            </div>
        </div>
        <div class="clear">
            <hr> 
        </div>
    </div>
    <div class="container eventi">
        <h2>Eventi</h2>
        <div class="row evento">
        <div class="col-3 overflow-hidden eventoindex" style="background-image: url(&quot;<?=$eventoimg[0]?>&quot;)">
                
            </div>
            <div class="col text-justify">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt consectetur facere consequuntur autem quae sint, accusamus veritatis nihil laborum qui accusantium totam dolorem dolor vero commodi officia dicta doloremque iusto!</p>
                <a href="evento.php?id=<?=$eventid;?>" target="_blank">Scopri di pi&ugrave; <i class="bi bi-arrow-right"></i></a>
            </div>

        </div>
        <!--prova-->
        <div class="row evento">
        <div class="col-3 overflow-hidden eventoindex" style="background-image: url(&quot;<?=$eventoimg[1]?>&quot;)">
                <!--<img src="img/img_infor.jpg" alt="evento"><img evento-->
            </div>
            <div class="col text-justify">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt consectetur facere consequuntur autem quae sint, accusamus veritatis nihil laborum qui accusantium totam dolorem dolor vero commodi officia dicta doloremque iusto!</p>
                <a href="evento.php?id=<?=$eventid;?>" target="_blank">Scopri di pi&ugrave; <i class="bi bi-arrow-right"></i></a>
            </div>

        </div>
        <div class="row evento">
        <div class="col-3 overflow-hidden eventoindex" style="background-image: url(&quot;<?=$eventoimg[2]?>&quot;)">
                <!--<img src="img/img_infor.jpg" alt="evento"><img evento-->
            </div>
            <div class="col text-justify">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt consectetur facere consequuntur autem quae sint, accusamus veritatis nihil laborum qui accusantium totam dolorem dolor vero commodi officia dicta doloremque iusto!</p>
                <a href="evento.php?id=<?=$eventid;?>" target="_blank">Scopri di pi&ugrave; <i class="bi bi-arrow-right"></i></a>
            </div>

        </div>
    </div>

</div>

<div class="credits">

Immagine di <a href="https://it.freepik.com/foto-gratuito/concetto-di-hosting-di-siti-web-con-circuiti_26412535.htm#query=informatica&position=3&from_view=search&track=sph">Freepik</a>>
Immagine di <a href="https://it.freepik.com/foto-gratuito/ricercatore-di-primo-piano-che-tiene-la-vetreria_11630658.htm#query=chimica&position=5&from_view=search&track=sph">Freepik</a>
<a href="https://it.freepik.com/foto-gratuito/ingranaggi-e-ruote-dentate_1026583.htm#query=meccanica&position=18&from_view=search&track=sph">Immagine di onlyyouqj</a> su Freepik

</div>


























<?php require_once('footer.php'); ?>