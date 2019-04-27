<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
    <link rel="stylesheet" href="./styles/galeria.css" type="text/css">
    <link rel="icon" href="./images/<?=$fejlec['kepforras']?>">

<?php

include('includes/config.inc.php');

$kepek = array();
$olvaso = opendir($GaleriaMAPPA);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($GaleriaMAPPA.$fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl)-4));
        if (in_array($vege, $TIPUSOK)) {
            $kepek[$fajl] = filemtime($GaleriaMAPPA.$fajl);
        }
    }
}
closedir($olvaso);
$uzenet = array();

// Űrlap ellenőrzés:
if (isset($_POST['kuld'])) {
    //print_r($_FILES);
    foreach($_FILES as $fajl) {
        if ($fajl['error'] == 4);   // Nem töltött fel fájlt
        elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
            $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
        elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
            or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
            or $fajl['size'] > $MAXMERET)
            $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
        else {
            $vegsohely = $MAPPA.strtolower($fajl['name']);
            if (file_exists($vegsohely))
                $uzenet[] = " Már létezik: " . $fajl['name'];
            else {
                move_uploaded_file($fajl['tmp_name'], $vegsohely);
                $uzenet[] = ' Ok: ' . $fajl['name'];
            }
        }
    }
}

?>


</head>
<body>

<div class="galeria">

    <h1>Galéria</h1>
    <p class="szoveg"><b>Nyerjenek bepillantást iskolánk életébe! </b> Ezeket a képeket azért válogattuk össze, hogy az interneten keresztül is megismerhessék iskolánk hangulatát. </p>
    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
        ?>

        <div class="gallery">
            <a target="_blank" href="<?php echo $GaleriaMAPPA.$fajl ?>">
                <img class="kepekGaleria" src="<?php echo $GaleriaMAPPA.$fajl ?>" alt="Fénykép" width="">
            </a>
            <div class="desc">Dátum:  <?php echo date($DATUMFORMA, $datum); ?></div>
        </div>

        <?php
    }
    ?>


</div>

<form action="feltolt.php" method="post"
      enctype="multipart/form-data">
    <label>További kép feltöltése
        <input type="file" name="feltoltes" required>
        <input type="submit" name="kuld">
</form>
</body>

</html>