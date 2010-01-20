<html>
<body>

<?php
// Created by Talisman 01/2010 ★✩ 

$vorto = $_GET['vorto']; // Get the Word from Outer Space and Search for it!

if (isset($vorto))
	{
	echo $vorto;
	} else {
		$Help = "No Vorto -> add ?vorto=TheWordYouWant to the end of this website";
		echo $Help;
	}
	

//$v =  fopen("http://vortaro.us.to/ajax/epo/eng/' + $vorto + '/?callback=?', "r");


// Now Lets Search Alex's Vortareo
//	ex. http://vortaro.us.to/ajax/epo/eng/petas/?callback=?
// Future Feature inproved language functinality

$url1 = "http://vortaro.us.to/ajax/epo/eng/"; 
$url2 = "/?callback=?";
$finalurl= $url1 . $vorto . $url2;
echo $finalurl;
echo "<br>";

$content =file_get_contents($finalurl) ;
echo $content;

/*

$v1 = fopen($finalurl ,"r");
echo $v1;


$frv1 = fread($v1,filesize($v1));
echo $frv1 ;

//$Help2 = "did echo v1 does internet work?";

//echo $Help2;
*/

?>

</body>
</html>