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

$first_letters = array(
	0  => (array ( phones  => array('S','Z'), decimal => 0, binary => 0, suit=> array (suit1 => 's', suit2 => 's') )),
	1  => (array ( phones  => array('T'), decimal => 1, binary => 1, suit => array (suit1 => 'c', suit2 => 'd') )),
	2  => (array ( phones  => array('n'), decimal => 2, binary => 2, suit => array (suit1 => 'c', suit2 => 'h') )),
	3  => (array ( phones  => array('m'), decimal => 3, binary => 3, suit => array (suit1 => 'c', suit2 => 's') )),
	4  => (array ( phones  => array('r','ر‎'), decimal => 4, binary => 4, suit => array (suit1 => 'd', suit2 => 'c') )),
	5  => (array ( phones  => array('L'), decimal => 5, binary => 5, suit => array (suit1 => 'd', suit2 => 'h') )),
	6  => (array ( phones  => array('b'), decimal => 6, binary => 6, suit => array (suit1 => 'd', suit2 => 's') )),
	7  => (array ( phones  => array('k','ח','ق‎'), decimal => 7, binary => 7, suit => array (suit1 => 'c', suit2 => 'c') )),
	8  => (array ( phones  => array('f','v'), decimal => 8, binary => 8, suit => array (suit1 => 'h', suit2 => 'c') )),
	9  => (array ( phones  => array('p'), decimal => 9, binary => 9, suit => array (suit1 => 'h', suit2 => 'd') )),
	10 => (array ( phones  => array('g','y','Γ','غ‎','ع'), decimal => NULL, binary => 10, suit => array (suit1 => 'h', suit2 => 's') )),
	11 => (array ( phones  => array('h'), decimal => NULL, binary => 11, suit => array (suit1 => 'h', suit2 => 'h') )),
	12 => (array ( phones  => array('sk','sn','sm'), decimal => NULL, binary => 12, suit => array (suit1 => 's', suit2 => 'c') )),
	13 => (array ( phones  => array('st','sp'), decimal => NULL, binary => 13, suit => array (suit1 => 's', suit2 => 'd') )),
	14 => (array ( phones  => array('sh','sl','sw','j','ch'), decimal => NULL, binary => 14, suit => array (suit1 => 's', suit2 => 'h') )),
	15 => (array ( phones  => array('d'), decimal => NULL, binary => 15, suit => array (suit1 => 'd', suit2 => 'd') )),
	16 => (array ( phones  => NULL, decimal => NULL, binary => NULL, suit => NULL )),
	17 => (array ( phones  => NULL, decimal => NULL, binary => NULL, suit => NULL )),
	18 => (array ( phones  => NULL, decimal => NULL, binary => NULL, suit => NULL ))
);
//echo "Letters: $first_letters[0][phones][0], $first_letters[0][phones][1] | $first_letters[1]"; // S


$cycles = count($first_letters); 
echo "<ol>";
for ($row = 0; $row < $cycles; $row++)
{
    echo "<li><b>The row number $row</b>";
    echo "<ul>";

    for ($col = 0; $col < 3; $col++)
    {
        echo "<li>".$first_letters[$row][$col]."</li>";
    }

    echo "</ul>";
    echo "</li>";
}
echo "</ol>";


$middle_letters = array(
	0  => 'o',
	1  => 'i',
	2  => 'u',
	3  => 'aa',
	4  => 'a',
	5  => 'ai',
	6  => 'ih',
	7  => 'e',
	8  => 'ei',
	9  => 'uh',
	10 => '',
	11 => '',
	12 => '',
	13 => '',
	14 => '',
	15 => '',
	16 => 'ow',
	17 => 'or',
	18 => 'ar'
);
$final_letters = array(
	0  => 'S/Z',
	1  => 'T',
	2  => 'n',
	3  => 'm',
	4  => 'r/th',
	5  => 'L',
	6  => 'b',
	7  => 'k',
	8  => 'f/v',
	9  => 'p',
	10 => '',
	11 => '',
	12 => '',
	13 => '',
	14 => '',
	15 => '',
	16 => 'j/sh/ch',
	17 => 'g',
	18 => 'd'
);
?>
<pre>

<?php

foreach ($first_letters as $first_letter) {
	//echo $first_letter[1];
}

print_r($first_letters);

print_r($middle_letters);

print_r($final_letters);
?>
</pre>

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
</p>

</body>
</html>
