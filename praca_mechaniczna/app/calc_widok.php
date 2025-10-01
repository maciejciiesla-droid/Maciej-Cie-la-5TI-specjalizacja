<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Obliczanie pracy mechanicznej</title>
</head>
<body>
    <h2>Obliczanie pracy mechanicznej</h2><br>
    wzór:W=F*s<br><br>

    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">

        <label for="id_x">F (siła): </label>
        <input type="text" id="id_x" name="x" placeholder="wpisz F(siła)" /><br />

        <br>

        <label for="id_y">s (droga): </label>
        <input type="text" id="id_y" name="y" placeholder="wpisz s(droga)"  /><br />

        <br>
        <input type="submit" value="oblicz" >
    </form>

    <?php
        //wyświetlanie listy błędów
        if (isset($messages)) {
	    if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
    ?>

    <?php if (isset($result)){ ?>
    <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
    <?php echo 'Wynik: '.$result; ?>
    </div>
    <?php } ?>
</body>
</html>