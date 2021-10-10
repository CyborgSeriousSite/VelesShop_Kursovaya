<?php
session_start();
$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");
$LoginState = 1;
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql="SELECT USERLOGIN,USERPASSWORD,USERID FROM users ORDER BY USERID";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
		if(strtolower($_GET['Login'])==strtolower($row[0]))
		{
			if($_GET['Password']==$row[1])
			{
				$LoginState = 0;
				$_SESSION["Username"] = $_GET['Login'];
				$_SESSION["UserID"] = $row[2];
				$_SESSION["NotMineComputer"] = $_GET['NotMineComputer'];
				break;
			}
		}
    }
  // Free result set
  mysqli_free_result($result);
}

switch ($LoginState) {
    case 0:
        echo "";
        break;
    case 1:
        echo "Неверный логин и пароль";
        break;
}

mysqli_close($con);
?>