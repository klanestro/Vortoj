<html>
<body>

<?php
// Created by Talisman 01/2010 ★✩ 

$vorto = $_GET['vorto']; // Get the Word from Outer Space and Search for it!

if (isset($vorto))
	{
	echo " Your Direct search was " . $vorto .  ' </br> '; 
	} else {
		$Help = "No Vorto -> add "" ?vorto=TheWordYouWant"" to the end of this website";
		echo $Help;
	}
	


// Now Lets Search Alex's Vortaro, It uses jsonp
//	ex. http://vortaro.us.to/ajax/epo/eng/petas/?callback=?

/* Future Feature inproved language functinality */

// I used the capital AV to denote variables belonging to Alex's Vortaro
// #Plans for (	traduku.net, tn
//				:apertium.org,ap // I think its apertium.org
//				:reto-vartaro,rv 
//				:project gutenburg, pg
//				:google books, gb
//  BUT NEXT UP ЄЭ smart.fm  

$AVurl1 = "http://vortaro.us.to/ajax/epo/eng/"; 
$AVurl2 = "/?callback=";
$AVfinalurl= $AVurl1 . $vorto . $AVurl2;


$AVcontent = file_get_contents($AVfinalurl) ;

// Now we need to trim the () jsonp to json
$AVcontent = substr($AVcontent, 1);
$AVcontent = substr($AVcontent,0,-1);

$AVDecode = json_decode($AVcontent);
print_r($AVDecode);


/* 

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
print_r(json_decode($AVcontent));


// echo $AVDecode . ' </br> ';
// 
 
// Why can't I echo or access information with $AVDecode? Is it something with
// jsonp?

// echo $AVcontent;
echo $AVfinalurl . ' </br> '; // DEBUG CODE 
echo $AVcontent . ' </br> ';   // DEBUG CODE 
// $AVDecode = (json_decode($AVcontent)); // Doesn't seem to matter which way


*/

?>

</body>
</html>