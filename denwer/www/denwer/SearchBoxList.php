<?php
echo "

<tr>
<td>
Похожее по запросу:
<hr>
</td>
</tr>
";

$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sqlProducts="SELECT PRODUCTID,PRODUCTNAME,PRODUCTDESC,PRODUCTFEATURES,PRODUCTPIC FROM products ORDER BY PRODUCTID";
$Qsearchlist = array();
$userInput = $_GET['q'];

if ($result=mysqli_query($con,$sqlProducts))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
		array_push($Qsearchlist, $row[1]);
	}
	mysqli_free_result($result);
  }
  
	usort($Qsearchlist, function ($a, $b) use ($userInput) {
		similar_text($userInput, $a, $percentA);
		similar_text($userInput, $b, $percentB);

		return $percentA === $percentB ? 0 : ($percentA > $percentB ? -1 : 1);
	});
  
    $maxi = count($Qsearchlist);
	if($maxi>15) {
		$maxi=15;
	}
for ($i = 0; $i < $maxi; $i++) {
	
	if ($result2=mysqli_query($con,$sqlProducts))
	  {
		// Fetch one and one row
		while ($row=mysqli_fetch_row($result2))
		{
			if($Qsearchlist[$i]==$row[1]) {
				$qsid = $row[0];
				break;
			}
		}
		mysqli_free_result($result2);
	  }
	
    echo "
		<tr class=\"ProdListLine\">
		<td>
		<a onclick=\"WatchProductByURL(".$qsid.");\">".$Qsearchlist[$i]."</a>
		</td>
		</tr>
		";
}
?>