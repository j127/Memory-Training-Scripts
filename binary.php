<!DOCTYPE html>
<html lang="en">
<head>
  <title>Random Binaries</title>
  <style type="text/css">
  body {width: 90%;font-size:1.3em; padding: 0 20px;}
  </style>
  <meta charset="utf-8">
</head>
<body>
<h1>Random Binary Number Generator</h1>
<p>Random binary digits where each number between 0000000000 and 1111111111 is only displayed once. Copy the numbers into a word processor, add columns, and print. Reload the page (F5) to randomize the numbers again. Or try the <a href="/random/decimal3.php">decimal version</a>.</p>
<p>
<?php

$binaries = array();
for ($a = 0; $a <=1023; $a++) {
	$binaries[] = $a;
}

foreach ($binaries as $i => $value) {
	$number = (int)$i;
    if(($number<10) && ($number>=0)) {
		$binaries[$i] = "00$i";
	} elseif(($number<100) && ($number>9)) {
		$binaries[$i] = "0$i";
	} elseif(($number<1000) && ($number>99)) {
		$binaries[$i] = $i;
	}
}

shuffle($binaries);
foreach ($binaries as $number) {
	$padded_num = decbin($number);
	echo str_pad($padded_num,10,"0",STR_PAD_LEFT) . '<br />';
}
//print_r($binaries);
?>
</p>
</body>
</html>
