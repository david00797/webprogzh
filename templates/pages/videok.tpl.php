
<head>

    <?php
    include('includes/config.inc.php');
    ?>
    <link rel="stylesheet" href="./styles/videok.css" type="text/css">
</head>


<body>




<div class="videogaleria">

    <h1>Videók</h1>
    <p class="szoveg"> A Kiskunfélegyházi Móra Ferenc Gimnázium Informatika Tanulmányi területének bemutatása  </p>

    <video height="500" controls>
        <source src="<?php echo $VideoFajl ?>" type="video/mp4">
        Az Ön böngészője nem támogatja ezt a videó formátumot.
    </video>






<p>Diákélet a Móra Gimiben</p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/3P2Tec9Rixw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


</div>


</body>
