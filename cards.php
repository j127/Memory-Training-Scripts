<!DOCTYPE html>
<html lang="en">
<head>
  <title>Random Cards for Memory Training</title>
  <style type="text/css">
  body {width: 90%;font-size:1.3em; padding: 0 20px;}
  #data {font-family:Courier New, monospace;}
  .red {color: red;}
  .black {color: #000;}
  </style>
  <meta charset="utf-8">
</head>
<body>
<h1>Random Card Pairs Generator</h1>
<p>2652 card pairs for memory training. Copy into a word processor, add columns, and print. Reload the page (F5) to randomize again.</p>
<p id="data">
<?php

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

?>
</p>

</body>
</html>
