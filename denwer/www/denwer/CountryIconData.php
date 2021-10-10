<HTML><HEAD>
<?php
$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");
$idOfFlag = 0;
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT COUNTRYICON FROM countrys ORDER BY COUNTRYID";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
		if($_GET['id']==$idOfFlag)
		{
			echo "<img valign='middle' src='/denwer";
			printf ("%s",$row[0]);
			echo "'/>";
		}
		++$idOfFlag;
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>
</FORM>
</BODY>
</HTML>