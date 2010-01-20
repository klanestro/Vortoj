<html>
<body>

<?php

// Created by Talisman 01/2010 ★✩ 
//require 'HTTP/Request.php';
$vorto = $_GET['vorto']; // Get the Word from Outer Space and Search for it!

if (isset($vorto))
	{
	echo $vorto;
	return;
	} else {
//		$vorto = "";
		$Help = "No Vorto add ?vorto=TheWordYouWant to the end of this website";
		echo $Help;
	}
	



// Now Lets Search Alex's Vortareo
//	ex. http://vortaro.us.to/ajax/epo/eng/petas/?callback=?
// Future Feature inproved language functinality

//$v1 = fopen('http://vortaro.us.to/ajax/epo/eng/' + $vorto + '/?callback=?',r) or die($php_errormsg);

?>

</body>
</html>