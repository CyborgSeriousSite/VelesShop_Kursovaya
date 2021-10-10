<HTML><HEAD>
<?php
$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT COUNTRYNAME FROM countrys ORDER BY COUNTRYID";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    printf ("<option>%s</option>",$row[0]);
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>
</FORM>
</BODY>
</HTML>