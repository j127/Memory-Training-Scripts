<!DOCTYPE html>
<html lang="en">
<head>
  <title>Random Decimal Numbers for Memory Training</title>
  <style type="text/css">
  body {width: 90%;font-size:1.3em; padding: 0 20px;}
  </style>
  <meta charset="utf-8">
</head>
<body>
<h1>Random Decimal Number Generator</h1>
<p>Random decimal digits where each number between 000 and 999 is only displayed once. Copy the numbers into a word processor, add columns, and print. Reload the page (F5) to randomize the numbers again. Or try the <a href="binary3.php">binary version</a>.</p>
<p>
<?php

$decimals = array();
for ($a = 0; $a <=999; $a++) {
	$decimals[] = $a;
}

// randomize the array
shuffle($decimals);

foreach ($decimals as $number) {
	$padded_num = $number;
	echo str_pad($padded_num,3,"0",STR_PAD_LEFT) . '<br />';
}
//print_r($decimals);

?>
</p>
</body>
</html>
