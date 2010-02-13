<!-- ★✩ Created by Talisman with Medical Marijuana ★✩ -->
<!-- KlanestroTalisman@gmail.com -->
<!>
<?php
//  I am working on matching the individual words from array  $frequency 
//  to the search results from that individual word.



include 'utf8wordcount.php';
include 'preniVortoj.php';

// print_r($frequency);
echo count($frequency);

//showphp_AlexVortaro ();
//showphp_Smartfm();


for($i=0; $i<count($frequency); $i++) {

   showphp_AlexVortaro(getphp_AlexVortaro($frequency[$i]));
   showphp_Smartfm($frequency[$i]); 
   
}



//getphp_AlexVortaro ($vorto)
//getphp_Smartfm($vorto)




?>