<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$F,&$s){
	$F = isset($_REQUEST['sila']) ? $_REQUEST['sila'] : null;
	$s = isset($_REQUEST['droga']) ? $_REQUEST['droga'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$F,&$s,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($F) && isset($s))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $F == "") {
		$messages [] = 'Nie podano wartości siły';
	}
	if ( $s == "") {
		$messages [] = 'Nie podano wartości drogi';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $F )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $s )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$F,&$s,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int
	$F = intval($F);
	$s = intval($s);
	
	//wykonanie operacji
	
	$result = $F*$s;
}

//definicja zmiennych kontrolera
$F = null;
$s = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($F,$s);
if ( validate($F,$s,$messages) ) { // gdy brak błędów
	process($F,$s,$messages,$result);
}

include 'calc_view.php';