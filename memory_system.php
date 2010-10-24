<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>Memory System</title>
  <style type="text/css">
  body {width: 90%;font-size:1.3em; padding: 0 20px;}
  table { width:100%;margin:0;padding:0;border: 1px solid #ccc; font-family:Courier New,monospace;border-collapse:collapse;}
  table td { padding: 5px 10px; border:1px solid #666;}
  </style>
</head>
<body>
<h1>Memory System</h1>

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

echo '<table>';

//counter
$counter = 0;

for ($row1 = 0; $row1 < 19; $row1++) {

    for ($row2 = 0; $row2 < 19; $row2++) {
        for ($row3 = 0; $row3 < 19; $row3++) {

            //construct the binary number as $bin
            if(($row3 < 8) && ($row1 < 16) && ($row2 < 8)) {
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
                $let = NULL;
            }

            //construct cards as $car
            //get the correct suit pair
            $card_suits = $suits[$row1];
            //split suit pair in half
            $card_suit = str_split($card_suits);

            //put each suit in a string
            $card_suit1 = $card_suit[0];
            $card_suit2 = $card_suit[1];

            //turn suit codes into colored suit symbols
            switch ($card_suit1) {
                case 's':
                    $suit_code1 = '<span style="color:black">&spades;</span>';
                break;
                case 'h':
                    $suit_code1 = '<span style="color:red">&hearts;</span>';
                break;
                case 'd':
                    $suit_code1 = '<span style="color:red">&diams;</span>';
                break;
                case 'c':
                    $suit_code1 = '<span style="color:black">&clubs;</span>';
                break;
            }
            switch ($card_suit2) {
                case 's':
                    $suit_code2 = '<span style="color:black">&spades;</span>';
                break;
                case 'h':
                    $suit_code2 = '<span style="color:red">&hearts;</span>';
                break;
                case 'd':
                    $suit_code2 = '<span style="color:red">&diams;</span>';
                break;
                case 'c':
                    $suit_code2 = '<span style="color:black">&clubs;</span>';
                break;
            }
            //assemble pairs
            $car = "$cards[$row2]$suit_code1 $cards[$row3]$suit_code2";

            //check if anything should be removed
            if (strlen($dec) == 3) {
                $dec_check = 1;
            } else {
                $dec_check = 0;
            }
            if (strlen($bins) == 12) {
                $bin_check = 1;
            } else {
                $bin_check = 0;
            }

            //card check
            if(($cards[$row2] != "") && ($cards[$row3] != "") && ($suits[$row1] != "")) {
                $card_check = 1;
            } else {
                $card_check = 0;
            }

            // if there is something there, print to browser
            if(($dec_check == 1) || ($bin_check == 1) || ($card_check == 1)) {
                $counter ++;

                echo "<tr>";

                echo "<td>$counter</td>";

                echo "<td>";
                if ($dec_check == 1) {
                    echo $dec;
                }
                echo "</td>";

                echo "<td>";
                if ($bin_check == 1) {
                    echo $bins;
                }
                echo "</td>";

                echo "<td>";
                if ($card_check == 1) {
                    echo "$car <span style='color:#eee;'>($suits[$row1])</span>";
                }
                echo "</td>";

                echo "<td>$let</td>";

                echo "</tr>";

//                echo "$counter: <span style='color:#eee;'>$row1-->$row2-->$row3 |</span>";
//
//                if ($dec_check == 1) {
//                    echo $dec;
//                }
//                echo " | $bins | $car <span style='color:#eee;'>($suits[$row1])</span> | $let <br>";
            }
        }
    }
}
echo '</table>';

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


?>


</body>
</html>