<?php

if(count($_SESSION['Cart'])>0) {
echo "<tr class=\"cartline\" id=\"cartdescline\">

<td width=32px class=\"CartImg\">

</td>

<td align=\"center\">
Название товара
</td>

<td align=\"center\">
Количество
</td>

<td align=\"center\">
Цена
</td>

<td align=\"center\">
Цена с учетом количества
</td>

<td align=\"center\">
Убрать
</td>

</tr>";
} else {
echo "<tr class=\"cartline\" id=\"cartdescline\">

<td width=100% align=center>
ПУСТО
</td>

</tr>";
}

if($_SESSION['Cart']!=NULL) {
	
	$CartItemSum = 0;
	
	foreach ($_SESSION['Cart'] as $key=>$value) {
		$CartItem = array();
		$CartItem = explode("|", $_SESSION['Cart'][$key]);
		$CartItemName = "N/A";
		
		$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");

		if (mysqli_connect_errno())
		{
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql="SELECT PRODUCTID,PRODUCTNAME,PRODUCTDESC,PRODUCTFEATURES,PRODUCTPIC FROM products ORDER BY PRODUCTID";
		
		if ($result=mysqli_query($con,$sql))
		{
			// Fetch one and one row
			while ($row=mysqli_fetch_row($result))
			{
				if($row[0]==$CartItem[0]) 
				{
					$CartItemName = $row[1];
					
					$sqlStorage="SELECT STORAGEID,STORAGEPRODID,STORAGECOUNT,STORAGEPRODPRICE FROM storage ORDER BY STORAGEID";
					$sqlDiscount="SELECT DISCOUNTID,DISCOUNTPERCENT FROM discounts ORDER BY DISCOUNTID";
					$pcount = 0;
					$pprice = 0;
					
					if ($result2=mysqli_query($con,$sqlStorage)) {
						while ($row2=mysqli_fetch_row($result2))
						{
							if($row[0]==$row2[1]) {
								$pcount = $row2[2];
								$pprice = $row2[3];
								break;
							}
						}
					}
					
					if ($result3=mysqli_query($con,$sqlDiscount)) {
						while ($row3=mysqli_fetch_row($result3))
						{
							if($row[0]==$row3[0]) {
								$pdiscount = $row3[1];
								break;
							} else {
								$pdiscount = 0;
							}
						}
					}
					
					$CartItemPrice = $row2[3];
					if($pdiscount>0) {
						$CartItemPrice = $pprice - ($pprice*($pdiscount*0.01));
					}
					
					$CartItemPriceWithCount = $CartItemPrice*$CartItem[1];
					
					$CartItemSum += $CartItemPriceWithCount;
					
					break;
				}
			}
		}
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_free_result($result3);
		
		echo "<tr class=\"cartline\" id=\"cartline".$key."\">

		<td width=32px class=\"CartImg\">
		<img height=32px width=32px src=\"".$row[4]."\"/>
		</td>

		<td align=\"center\">
		".$CartItemName."
		</td>

		<td align=\"center\">
		".$CartItem[1]." шт.
		</td>

		<td align=\"center\">
		".$CartItemPrice." руб
		</td>

		<td align=\"center\">
		".$CartItemPriceWithCount." руб
		</td>

		<td align=\"center\" class=\"removefromcartbutton\" id=\"CRemove".$key."\" onclick=\"RemoveFromCart(this.id);\">
		-
		</td>

		</tr>";
	}
	
	if(count($_SESSION['Cart'])>0) {
		echo "<tr class=\"cartline\" id=\"cartdescline\">

		<td width=32px class=\"CartImg\" align=\"right\" colspan=4>
		Итого:
		</td>

		<td align=\"center\">
		".$CartItemSum." руб
		</td>
		
		<td align=\"center\">
		<input type=\"button\" value=\"Купить\" class=\"BuyButton\"></input>
		</td>

		</tr>";
	}
	
	
}


?>