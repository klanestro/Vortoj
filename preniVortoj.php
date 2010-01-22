<html>
<body>

<?php
// Created by Talisman 01/2010 ★✩ 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$vorto = $_GET['vorto']; // Get the Word from Outer Space and Search for it!




if (isset($vorto))
	{
	echo " Your Direct search was " . $vorto .  ' <br></br> '; 
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
// 						each root word has an xml file,  but how to you find this xml file?
//						there is a xml link on the bottom of a search result,  but I can't figure 
//						out a way to get to this info.
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
	}


function getphp_Smartfm($vorto)
	{
		$SFurl="http://api.smart.fm/items/matching/";
		// $SFurl2=urlencode($vorto); // +".json";
		$SFurl3="?language=eo&translation_language=en";
		$SFfinalurl = $SFurl . $vorto . ".json" . $SFurl3;  // you can change .json to .xml

		$SFcontent = file_get_contents($SFfinalurl);
		$SFDecode = json_decode($SFcontent);

		return ($SFDecode);
	}
	
		
$AVvorto = getphp_AlexVortaro ($vorto);
$SFvorto = getphp_Smartfm($vorto);



function showphp_AlexVortaro ($AVvorto)
	{
	$AVvortoshow = $AVvorto->text;
	echo $AVvortoshow;
	
	}

showphp_AlexVortaro ($AVvorto);



function showphp_Smartfm($SFvorto)
{
   // $objects is the array with all those objects
foreach($SFvorto as $object)
{
  echo $object->cue->language; // language

  foreach($object->responses as $response)
  {
    // if there are no quizzes, we skip the part below
    // we skip it because $object->quizzes will produce a warning or a notice
    // if "quizess" is not a member of the $object
    if(!isset($object->responses))
    {
      continue;
    }
// print_r($response);  //works
// print_r($response->quizzes); //works

foreach($response->quizzes as $quiz)
    {
      echo $quiz->question; // question
      echo $quiz->answer; // answer
      echo '<br></br>';
    }
    // quizess
    /*
    foreach($response->quizzes as $quiz)
    {
      echo $quiz->question; 
      echo $quiz->answer; 
    }
    */
  }
}
   
   
}


showphp_Smartfm($SFvorto);
// print_r($SFvorto);

?>

</body>
</html>