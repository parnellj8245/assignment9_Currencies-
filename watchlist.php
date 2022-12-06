<?php
	$name=$_POST["wName"];
	$items=$_POST["items"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Watchlist</title>
	<link href="watchlistStyle.css" rel="stylesheet" />
</head>
	<body>	
		<h1><?=$name ?>:</h1>
		<table>
			<?php	
			//Loop that prints out all the data of each currency
			foreach($items as $symbol=>$price){
				//random number to choose one of the two premade graphs
				$randomGraph=rand(0,1);
				//create random percent for the percentage change of currency
				$randomPercent=rand(0,101);
			?>	
			<tr>
				<td id="symbol"><?= $symbol ?> </td>
				<td>Mark: <?= $price ?> </td>
				<td><img src="fakeGraph<?=$randomGraph ?>.png" alt="fakeGraph"></td>
				<td id="markup">+0.<?=$randomPercent ?>%</td>
			</tr>
			<?php
			}
			?>	
		</table>
	</body>
</html>