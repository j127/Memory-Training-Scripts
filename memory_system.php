<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>Memory System</title>
  <style type="text/css">
  body {width: 90%;font-size:1.3em; padding: 0 20px;}
  #data {font-family:Courier New, monospace;}
  table td { border: 1px solid #ccc; }
  </style>
</head>
<body>
<h1>Memory System</h1>

<p id="data">
<?php

$first_letters = array('s/z','t','n','m','r','L','b','k','f/v','p','g/y','h','sk/sn/sm','st/sp','sh/sl/sw/j/ch','d',NULL,NULL,NULL);
$middle_letters = array('o','i','u','aa','a','ai','ih','e','ei','uh',NULL,NULL,NULL,NULL,NULL,NULL,'ow','or','ar');
$final_letters = array('S/Z','T','n','m','r/th','L','b','k','f/v','p',NULL,NULL,NULL,NULL,NULL,NULL,'j/sh/ch','g','d');
$decimals = array(0,1,2,3,4,5,6,7,8,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
$binaries = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,NULL,NULL,NULL);
$suits = array('ss','cd','ch','cs','dc','dh','ds','cc','hc','hd','hs','hh','sc','sd','sh','dd',NULL,NULL,NULL);
$cards = array("10","A","2","3","4","5","6","7","8","9",NULL,NULL,NULL,NULL,NULL,NULL,"J","Q","K");
$pairs = array();

$full_set = array($first_letters,$middle_letters,$final_letters,$decimals,$binaries,$suits,$cards);

//echo count($first_letters) . count ($middle_letters) .count($final_letters) . count($decimals).count($suits).count($pairs);
echo '<h2>Extract</h2>';

//echo '<div style="background-color:#eee;"><pre>';
//print_r($full_set);
//echo '</pre></div>';

echo '<div style="background-color:#FFFFA0;"><pre>';

for ($row1 = 0; $row1 < 19; $row1++) {

    //echo "$row1-->";

    for ($row2 = 0; $row2 < 19; $row2++) {
        for ($row3 = 0; $row3 < 19; $row3++) {

            //construct the binary number as $bin
            if($row3 < 8) {
                $bin1 = decbin($binaries[$row1]);
                $bin1 = str_pad($bin1,4,"0",STR_PAD_LEFT);
                $bin2 = decbin($binaries[$row2]);
                $bin2 = str_pad($bin2,3,"0",STR_PAD_LEFT);
                $bin3 = decbin($binaries[$row3]);
                $bin3 = str_pad($bin3,3,"0",STR_PAD_LEFT);
                $bins = "$bin1 $bin2 $bin3";
            } else {
                $bins = NULL;
            }

            //construct the decimals as $dec
            if($row3 < 10) {
                $dec = $decimals[$row1] . $decimals[$row2] . $decimals[$row3];
            } else {
                $dec = NULL;
            }

            //construct letters as $let
            if($row3 < 16) {
                $let = "$first_letters[$row1], $middle_letters[$row2], $final_letters[$row3]";
            } else {
                $let = "null";
            }

            //construct cards as $car
            //str_split($str);
            $card_suits = $suits[$row1];
            $card_suit = str_split($card_suits);
            //print_r($card_suit);
            $car = "$cards[$row2]$card_suit[0] $cards[$row3]$card_suit[1]";

            // Provides: You should eat pizza, beer, and ice cream every day
//$phrase  = "You should eat fruits, vegetables, and fiber every day.";
//$healthy = array("fruits", "vegetables", "fiber");
//$yummy   = array("pizza", "beer", "ice cream");

//$newphrase = str_replace($healthy, $yummy, $phrase);
//$string = 'The quick brown fox jumped over the lazy dog.';
//$patterns = array();
//$patterns[0] = '/quick/';
//$patterns[1] = '/brown/';
//$patterns[2] = '/fox/';
//$replacements = array();
//$replacements[2] = 'bear';
//$replacements[1] = 'black';
//$replacements[0] = 'slow';
//echo preg_replace($patterns, $replacements, $string);


            echo "$row1-->$row2-->$row3 | $let | $dec | $bins | $car ($suits[$row1])<br>";
        }
    }


//foreach ($full_set as $full) {
//    foreach ($full as $key => $value) {
//        echo "$key ---> $value<br />";
//    }



//    if (is_array($full)) {
//        foreach ($full as $key => $value) {
//            echo "$key ---> $value<br />";
//        }
//    }
}
echo '</pre></div>';

// works:
//echo '<pre>';
//foreach ($first_letters as $key_first => $value_first) {
//    echo "$key_first => $value_first<br />";
//    foreach ($middle_letters as $key_middle => $value_middle) {
//        echo "\t$key_middle => $value_middle<br />";
//            foreach ($final_letters as $key_final => $value_final) {
//                echo "\t\t$key_final => $value_final<br />";
//            }
//    }
//}
//
//echo '</pre>';
/*
foreach ($old_suits as $old_suit1) {
	foreach ($cards as $card1) {
		foreach ($old_suits as $old_suit2) {
			foreach ($cards as $card2) {

				// set color of first card
				if ($suit1 == '&spades;' || $suit1 == '&clubs;') {
					$color = 'black';
				} else {
					$color = 'red';
				}

				// assemble the first card
				$set1 = '<span class="' . $color . '">' . $card1 . $suit1 . '</span>';

				// set color of second card
				if ($suit2 == '&spades;' || $suit2 == '&clubs;') {
					$color = 'black';
				} else {
					$color = 'red';
				}

				// assemble the second card
				$set2 = '<span style="color:' . $color . ';">' . $card2 . $suit2 . '</span>';

				// removing 52 duplicates, insert the assembled pairs into the array
				// e.g., there aren't two Ace of Spades in one deck
				if ($set1 != $set2) {
					// fill the array with pairs
					$pairs[] = "$set1 $set2";
				}
			}
		}
	}
}

// randomize
//shuffle($pairs);

// print the output

foreach ($pairs as $pair) {
	echo $pair . "<br />\n";
}

echo '<pre>';
foreach ($pairs as $key => $value) {
    echo $key . '=>' . $value . '<br />';
}

echo '</pre>';
*/


?>

<h2>OUTPUT</h2>


<table>
<tr>
<th>#</th>
<th>Decimal</th>
<th>Binary</th>
<th>Cards</th>
<th>Image</th>
</tr>


</table>
<?php
/*
$suits = array("&spades;","&hearts;","&diams;","&clubs;");
$cards = array("A","2","3","4","5","6","7","8","9","10","J","Q","K");
$pairs = array();

foreach ($suits as $suit1) {
	foreach ($cards as $card1) {
		foreach ($suits as $suit2) {
			foreach ($cards as $card2) {

				// set color of first card
				if ($suit1 == '&spades;' || $suit1 == '&clubs;') {
					$color = 'black';
				} else {
					$color = 'red';
				}

				// assemble the first card
				$set1 = '<span class="' . $color . '">' . $card1 . $suit1 . '</span>';

				// set color of second card
				if ($suit2 == '&spades;' || $suit2 == '&clubs;') {
					$color = 'black';
				} else {
					$color = 'red';
				}

				// assemble the second card
				$set2 = '<span class="' . $color . '">' . $card2 . $suit2 . '</span>';

				// removing 52 duplicates, insert the assembled pairs into the array
				// e.g., there aren't two Ace of Spades in one deck
				if ($set1 != $set2) {
					// fill the array with pairs
					$pairs[] = "$set1 $set2";
				}
			}
		}
	}
}

// randomize
shuffle($pairs);

// print the output
foreach ($pairs as $pair) {
	echo $pair . "<br />\n";
}
*/

?>


</body>
</html>
<?php
/*
 * this works

echo '<hr /><h2>Extract</h2>';
$cycles = count($first_letters);

//echo $first_letters[0][phones][0] .'<p></p>'; // $first_letters[0][phones][1]; //| $first_letters[1];
for ( $row = 0; $row < $cycles; $row++ ) {
    while ( list( $key, $value ) = each( $first_letters[ $row ] ) ) {
        if(is_array($value)) {
            foreach ($value as $fdsa) {
                echo "|$fdsa";
            }
        }  else {
            echo "|$value";
        }
    }
 echo '|<br />';
}
 */


 ?>