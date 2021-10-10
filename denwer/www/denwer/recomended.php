<?php

$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql="SELECT RECOMENDEDID FROM newproducts ORDER BY RECOMENDEDID";
$sqlProducts="SELECT PRODUCTID,PRODUCTNAME,PRODUCTDESC,PRODUCTFEATURES,PRODUCTPIC FROM products ORDER BY PRODUCTID";
$sqlStorage="SELECT STORAGEID,STORAGEPRODID,STORAGECOUNT,STORAGEPRODPRICE FROM storage ORDER BY STORAGEID";
$sqlDiscount="SELECT DISCOUNTID,DISCOUNTPERCENT FROM discounts ORDER BY DISCOUNTID";
$sqlRecomended="SELECT ID FROM recomended ORDER BY ID";

$pid = 0;
$pname = "";
$pdesk = "";
$pfeatures = "";
$ppic = "";
$pcount = 0;
$pprice = 0;
$pdiscount = 0;

if ($result=mysqli_query($con,$sql))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
		if ($resultSecond=mysqli_query($con,$sqlProducts)) {
			while ($row2=mysqli_fetch_row($resultSecond))
			{
				if($row[0]=$row2[0]) {
					$pid = $row2[0];
					$pname = $row2[1];
					$pdesk = $row2[2];
					$pfeatures = $row2[3];
					$ppic = $row2[4];
					
					if ($resultThird=mysqli_query($con,$sqlStorage)) {
						while ($row3=mysqli_fetch_row($resultThird))
						{
							if($pid==$row3[1]) {
								$pcount = $row3[2];
								$pprice = $row3[3];
								break;
							}
						}
					}
					
					if ($resultFour=mysqli_query($con,$sqlDiscount)) {
						while ($row4=mysqli_fetch_row($resultFour))
						{
							if($pid==$row4[0]) {
								$pdiscount = $row4[1];
								break;
							} else {
								$pdiscount = 0;
							}
						}
					}
					
					$pInStorage = "";
					if($pcount>0) {
						$pInStorage = "ЕСТЬ НА СКЛАДЕ";
					} else {
						$pInStorage = "НЕТ НА СКЛАДЕ";
					}
					
					if ($resultFive=mysqli_query($con,$sqlRecomended)) {
						while ($row5=mysqli_fetch_row($resultFive))
						{
							if($row[0]==$row5[0]) {
								
							echo "
							<td>
							<table width=200px class=\"productboxitem\">
							<tr>
								<td align=center class=\"pbii\">
								<img height=150px src=\"".$ppic."\"/>
								</td>

							</tr>

							<tr>
								<td align=center height=200pt id=\"WatchRecomended_".$pid."\" onclick=\"WatchProduct(this.id);\">
								<hr>
								<span>".$pname."</span>
								<hr>
								<span>КОД: ".$pid."</span>
								<br>
								<span>НАЛИЧИЕ: ".$pInStorage."</span>
								<hr>
								</td>
							</tr>

							<tr>
								<td>

								<table><tr>
								<td class=\"CountProductInputTD\">
								<input id=\"InputRecomended_".$pid."\" class=\"CountProductInput\" size=\"1\" type=\"number\" value=\"1\" min=\"1\" size=\"1\" align=\"left\" />
								</td>
								<td align=\"center\">
								<span id=\"SpanRecomended_".$pid."\" class=\"SendToCartButton\" onclick=\"AddToCart(this.id);\">В корзину</span>
								</td>
								</tr></table>
								
								</td>
							</tr>

							<tr>
								<td align=\"center\">
								<hr>
								</td>
							</tr>

							<tr>
								<td align=\"center\" class=\"pbii2\">
								";
							if($pdiscount>0) {
								$pdiscountNow = $pprice - ($pprice*($row4[1]*0.01));
								echo "
									<span><strike>".$pprice."</strike> ".$pdiscountNow. " руб.</span>
								";
							} else {
							echo "
								<span>".$pprice." руб.</span>
							";
							}
							echo "
								</td>
							</tr>

							</table>
							</td>
							";
								
								break;
							}
						}
					}
				}
			}
			break;
		}
    }
  // Free result set
  mysqli_free_result($result);
  mysqli_free_result($resultSecond);
  mysqli_free_result($resultThird);
  mysqli_free_result($resultFour);
}

?>