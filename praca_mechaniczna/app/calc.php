<?php
    require_once dirname(__FILE__).'/../config.php';

    //1. pobieranie danych
    $x = $_REQUEST ['x'];
    $y = $_REQUEST ['y'];


    //2. walidacja

    //dane przekazane 
    if ( ! (isset($x) && isset($y))) {
	    $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów';
    }

    //sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $x == "") {
	    $messages [] = 'Nie podano liczby 1';
    }

    if ( $y == "") {
	    $messages [] = 'Nie podano liczby 2';
    }

    //3. wykonywanie zadania, jeśli walidacja przeszła
    if (empty($messages)){

        //konwersja parametrów na int
	    $x = intval($x);
	    $y = intval($y);

        //wykonywanie operacji

        $result = $x*$y;
    }

    include 'calc_widok.php';