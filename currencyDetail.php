<?php
$currency_name=$_REQUEST["name"];
list($name,$symbol)=file("$currency_name/info.txt");
/*
//log in information
$servername = "";
$database = "";
$username = "";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);

//check if connection to database was successful
if(!conn) {
	die ("Connection failed: " . mysqli_connect_error());
}

//gets the basic information of the currency, including the open and close price as well as the daily volume.
$sql="SELECT open,close,volume FROM details WHERE name='$currency_name';
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$open=$row["open"];
$close=$row["close"];
$volume=$row["volume"];

//gets the firms details, whether they upgrade or downgrade.
$sql="SELECT name,detail FROM analysts JOIN Firm_Detail WHERE name='$currency_name' && firm='$firmID'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row["name"];
$detail=$row["detail"];

//gets the analysts opinion on the currency, whether its a buy or sell.
$sql="SELECT buy,sell,overall FROM analysts WHERE name='$currency_name';
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$buys=$row["buys"];
$sells=$row["sells"];
$overall=$row["overall"];

//gets the news information for the currency.
$news=array();
$sql="SELECT provider,information FROM news WHERE name='$currency_name';
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	array_push($news,$row);
}

//close connection
mysqli_close($conn);
*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$currency_name ?> - Currency Details</title>
		<link href="cDetailStyle.css" rel="stylesheet" />
	</head>
	<body>
			<div><img src="<?=$currency_name ?>/overview.png" alt="image"></div>
		<table>
			<tr>
				<?php
				//retrieve and display currency detail information
				list($open,$close,$volume) =file("$currency_name/details.txt");	
				?>
				<td id="details">
					<?=$name ?>:<br>
					Symbol: <?=$symbol ?><br>
					Open: <?=$open ?><br>
					Close: <?=$close ?><br>
					Volume: <?=$volume ?>
				</td>
			</tr>
			<tr>
				<th id="analysts">
					ANALYSTS:
				</th>
			</tr>
			<tr>
				<?php
				//retrieve and display currency analyst information
				list($buys,$sells,$overall) =file("$currency_name/analysts.txt");
				?>
				<td>
					Buys: <?=$buys ?>				
					Sells: <?=$sells ?>
					Rating: <?=$overall ?>
				</td>
			</tr>
			<tr>
				<?php
				//retrieve and display currency upgrade/downgrade information
				list($name,$detail) =file("$currency_name/firm_detail.txt");
				?>
				<td>
					<?=$name ?> : <?=$detail ?>
				</td>
			</tr>
			<tr>
				<th>
					NEWS:
				</th>
			</tr>
			<tr>
				<td>
				<dl>
				<?php
				//loop that retrieves and displays currency news
				foreach (file("$currency_name/news.txt") as $info_line)
				{
					list($provider,$news) =explode(":",$info_line);
					?>
					<dt><?=$provider ?> </dt>
					<dd><?=$news ?> </dd>	
				<?php
				}
				?>		
				</dl>
				</td>
			</tr>	
		</table>
		<a href="assignment9.html">Return</a>
	</body>
</html>