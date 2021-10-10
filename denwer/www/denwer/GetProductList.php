<?php
echo "

<tr>
<td colspan=3>
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
$searchpage = $_GET['p'];

$indexforinform = 0;

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
	if($maxi>3*$searchpage) {
		$maxi=3*$searchpage;
	}
	
	$pages = intval(count($Qsearchlist)/3);
	if(intval(count($Qsearchlist)%3)>0) {
		$pages++;
	}
	
for ($i = 0+3*($searchpage-1); $i < $maxi; $i++) {
		
	if ($result2=mysqli_query($con,$sqlProducts))
	  {
		// Fetch one and one row
		while ($row=mysqli_fetch_row($result2))
		{
			if($Qsearchlist[$i]==$row[1]) {
				$qid = $row[0];
				$qimg = $row[4];
				break;
			}
		}
		mysqli_free_result($result2);
	  }
	  
	  $sqlStorage="SELECT STORAGEID,STORAGEPRODID,STORAGECOUNT,STORAGEPRODPRICE FROM storage ORDER BY STORAGEID";
	  $sqlDiscount="SELECT DISCOUNTID,DISCOUNTPERCENT FROM discounts ORDER BY DISCOUNTID";
	  
		if ($resultThird=mysqli_query($con,$sqlStorage)) {
			while ($row3=mysqli_fetch_row($resultThird))
			{
				if($qid==$row3[1]) {
					$Qprice = $row3[3];
					break;
				}
			}
		mysqli_free_result($resultThird);
		}
		
		if ($resultFour=mysqli_query($con,$sqlDiscount)) {
			while ($row4=mysqli_fetch_row($resultFour))
			{
				if($qid==$row4[0]) {
					$pdiscount = $row4[1];
					break;
				} else {
					$pdiscount = 0;
				}
			}
		mysqli_free_result($resultFour);
		}
	
    echo "
		<tr class=\"searchlineq clickableObj\" id=\"QLProduct".$qid."\" onclick=\"WatchProduct(this.id);\">
		<td width=100px height=100px>
		<img width=100px height=100px src=\"".$qimg."\"
		</td>
		<td valign=\"center\" width=90%>
		<span>".$Qsearchlist[$i]."</span>
		</td>
		</td>
		<td valign=\"center\" align=\"center\" width=100%>
		";
		
		if($pdiscount>0) {
			$pdiscountNow = $Qprice - ($Qprice*($row4[1]*0.01));
			echo "
				<span><strike>".$Qprice."</strike> ".$pdiscountNow. " руб.</span>
			";
		} else {
		echo "
			<span>".$Qprice." руб.</span>
		";
		}
		
    echo "
		</td>
		</tr>
		";
}

echo "

<tr>
<td colspan=3>
<hr>
<table border=0 align=center>
<tr>
";
if($searchpage!=1) {
echo "
<td>
<input type=\"button\" onclick='ShowSList_Button(\"Prev\");' value=\"<\"></input>
</td>
";
}
echo "
<td>
Страница ".$searchpage."
</td>
";
if($searchpage<$pages) {
echo "
<td>
<input type=\"button\" onclick='ShowSList_Button(\"Next\");' value=\">\"></input>
</td>
";
}
echo "
</tr>
</table>
</td>
</tr>
";
?>