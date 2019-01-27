<?php

// Definisanje putanja

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', DS.'home'.DS.'milanbildhosting'.DS.'public_html'.DS.'biblioteka');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');


// Ucitavanje funkcija
require_once(LIB_PATH.DS.'connection.php');
require_once(LIB_PATH.DS.'functions.php');

?>