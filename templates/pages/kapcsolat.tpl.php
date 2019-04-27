<link rel="stylesheet" href="./styles/kapcsolat.css" type="text/css">

<h2>Írjon nekünk!</h2>
    <p>Kérdése van? Esetleg üzenni szeretne nekünk? Ha igen jó helyen jár! Küldje el üzenetét az alábbí űrlap segítségével! Mindent megteszünk, hogy időben válaszoljunk a kérdéseire, észrevételeire. Általában aznap, vagy másnap már meg is kapja válaszát a kérdésére.</p>
    <form action="?oldal=feldolgoz" method="post">
        <h4>Az Ön adatai:</h4>

        <div class="kulso">
        <div class="belso">
        <div class="box">
            <label  for="first">Vezetéknév: </label>
            <input type="text" class="short" name="last" value="" id="last" required pattern="[' '\-a-zA-Z]+">


            <label for="last">Keresztnév: </label>
            <input type="text" class="short" name="first" value="" id="first" required pattern="[' '\-a-zA-Z]+">

        </div>
        <div class="separator"></div>
        <div class="box">
            <label for="email">E-Mail cím:</label>
            <input type="text"  class="short" name="email" value="" id="email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"">
        </div>
        <div class="separator"></div>

        <div class="box">
            <h4 class="inside">Üzenet:</h4>
            <textarea class="uzenetablak" id="uzenetablak" name="uzenetablak" required></textarea>
        </div>
        <div class="separator"></div>
        <div class="box long submit">
            <input type="submit" method="post">
        </div>

        </div>
        </div>
    </form>
