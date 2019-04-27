<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
    <link rel="icon" href="./images/<?=$fejlec['kepforras']?>">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>


<div class="csuszoheader" id="myHeader">
    <img class="cimerkep" src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>">
    <h1><?= $fejlec['cim'] ?></h1>
    <?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>

</div>
<div class="bugfix1">
</div>

	<header>


        <div id="navbar">

        <?php foreach ($oldalak as $url => $oldal) {
            if($oldal['menu']) { ?>
                <?= (($oldal == $keres) ? ' ' : '') ?>
                    <a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                        <?= $oldal['szoveg'] ?></a>

            <?php }
        } ?>
            <a href="http://moragimi.sulinet.hu/">Eredeti oldal</a>

            <div class="search-container">
                <form action="https://www.google.com/search" class="searchform" method="get" name="searchform" target="_blank">
                    <input name="sitesearch" type="hidden" value=<?= $webcim; ?>>
                    <input autocomplete="on" class="form-control search" name="q" placeholder="Keresés az oldalon..." required="required"  type="text">
                    <input class="keresoikon" type="image" src="./images/keresesikon.png" width="32"></input>
                </form>
            </div>
	</header >

<div id="wrapper">
    <aside class="jobb">

        <p><b>OM azonosító:</b></p>
        <p>027946</p>


        <p>Cím: Kiskunfélegyháza, Kossuth Lajos u. 9. 6100.</p>
        <p><b>Tel.:</b></p>
        <p>76/461-262</p>


    </aside><aside class="bal">
        <p><b>Együttműködő partnereink:</b></p>
        <?php

        include('includes/config.inc.php');

        $kepek = array();
        $olvaso = opendir($PartnerekMAPPA);
        while (($fajl = readdir($olvaso)) !== false) {
            if (is_file($PartnerekMAPPA.$fajl)) {
                $vege = strtolower(substr($fajl, strlen($fajl)-4));
                if (in_array($vege, $TIPUSOK)) {
                    $kepek[$fajl] = filemtime($PartnerekMAPPA.$fajl);
                }
            }
        }
        closedir($olvaso);

        ?>

        <div class="galeria">


            <?php
            arsort($kepek);
            foreach($kepek as $fajl => $datum)
            {
                ?>

                <div class="gallery2">
                    <a target="_blank" href="<?php echo $PartnerekMAPPA.$fajl ?>">
                        <img src="<?php echo $PartnerekMAPPA.$fajl ?>" alt="Fénykép" width="">
                    </a>
                </div>

                <?php
            }
            ?>


        </div>

    </aside>
    <main>
    <div id="content">
        <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </div>
    </main>
</div>



    <footer class="footer">


		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>

    </footer>



    <script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
    if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
    } else {
    navbar.classList.remove("sticky");
    }
    }

    </script>


</body>
</html>
