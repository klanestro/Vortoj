<html>
<body>

<?php
// Created by Talisman 01/2010 ★✩ 

$vorto = $_GET['vorto']; // Get the Word from Outer Space and Search for it!




if (isset($vorto))
	{
	echo " Your Direct search was " . $vorto .  ' </br> '; 
	} else {
		$Help = "No Vorto -> add ?vorto=TheWordYouWant to the end of this website";
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
// it also assumes epo-eng

function getphp_AlexVortaro ($vorto)
	{
		$AVurl1 = "http://vortaro.us.to/ajax/epo/eng/"; 
		$AVurl2 = "/?callback=";
		$AVfinalurl= $AVurl1 . $vorto . $AVurl2;


		$AVcontent = file_get_contents($AVfinalurl) ;

		// Now we need to trim the () jsonp to json
		$AVcontent = substr($AVcontent, 1);
		$AVcontent = substr($AVcontent,0,-1);

		$AVDecode = json_decode($AVcontent);
		
		return ($AVDecode);
//		print_r($AVDecode);

//		echo '<br></br>';
//		echo $AVDecode ->text;
//		echo '<br></br>';
	}


function getphp_Smartfm($vorto)
	{
		echo 'smartttt';
		$SFurl="http://api.smart.fm/items/matching/";
		// $SFurl2=urlencode($vorto); // +".json";
		$SFurl3="?language=eo&translation_language=en";
		$SFfinalurl = $SFurl . $vorto . ".json" . $SFurl3;  // you can change .json to .xml

		$SFcontent = file_get_contents($SFfinalurl);
		$SFDecode = json_decode($SFcontent);

		// make this smart
//		print_r($SFDecode);	
		return ($SFDecode);
	}
	
	
print_r(getphp_AlexVortaro ($vorto));
print_r(getphp_Smartfm($vorto));



?>

</body>
</html>