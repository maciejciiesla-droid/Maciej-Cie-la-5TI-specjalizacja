<?php
    require_once dirname(__FILE__).'/../config.php';
    

    //1. pobieranie danych
    $F = $_REQUEST ['sila'];
    $s = $_REQUEST ['droga'];


    //2. walidacja

    //dane przekazane 
    if ( ! (isset($F) && isset($s))) {
	    $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów';
    }

    //sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $F == "") {
	    $messages [] = 'Nie podano wartości siły';
    }

    if ( $s == "") {
	    $messages [] = 'Nie podano wartości drogi';
    }
    if (empty( $messages )) {
	

	//3. sprawdzenie, czy $F i $s są liczbami całkowitymi

	if (! is_numeric( $F )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $s )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

}

    //4. wykonywanie zadania, jeśli walidacja przeszła
    
    if (empty($messages)){

        //konwersja parametrów na int
	    $F = intval($F);
	    $s = intval($s);

        //wykonywanie operacji

        $result = $F*$s;
    }

    include 'calc_widok.php';