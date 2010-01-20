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
	


// Now Lets Search Alex's Vortaro, It uses jsonp
//	ex. http://vortaro.us.to/ajax/epo/eng/petas/?callback=?
// Future Feature inproved language functinality

$AVurl1 = "http://vortaro.us.to/ajax/epo/eng/"; 
$AVurl2 = "/?callback=";
$AVfinalurl= $AVurl1 . $vorto . $AVurl2;

echo $AVfinalurl . ' </br> '; // DEBUG CODE 

$AVcontent = file_get_contents($AVfinalurl) ;
echo $AVcontent . ' </br> ';   // DEBUG CODE 





// $AVDecode ="What the ";
 $AVDecode = json_decode($AVcontent);
 print_r(json_decode($AVcontent));

 
// /* 
 	if(isset( $AVcontent)) { 									// DEBUG CODE
 	echo "json_decode set AVcontent" . ' </br> ';
 	} else {
 	echo "something fishy here" . ' </br> ';
 	}
 	
 if (empty($AVcontent)){
 	echo "EMPTY EMPTY" . ' </br> ';
 	} else {
 	echo "Not Empty". ' </br> ';
 	}

echo $AVDecode . ' </br> ';
$JError = json_last_error();
echo $JError;
// */
 
// Why can't I echo or access information with $AVDecode? Is it something with
// jsonp?

?>

</body>
</html>