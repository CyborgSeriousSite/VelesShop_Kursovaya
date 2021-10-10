<HTML>
<HEAD>
<script type="text/javascript" src="jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
</HEAD>
<TITLE>
Профиль пользователя
</TITLE>
</HEAD>

<style>
body {
    background-color: rgba(255,255,255,1);
}
.ProfPage {
    background-color: rgba(200,200,200,1);
	width: 75%;
	height: 300px;
    margin: auto;
    border: 1px outset rgba(0,0,0,0.75);
	padding: 0px 5px 5px 5px;
	border-radius: 5px 5px 0px 0px;
	box-shadow: 1px 1px 1px rgba(0,0,0,1); /* Параметры тени */
}
.ProfInform {
    background-color: rgba(100,100,100,1);
}
p {
   margin: 5px 0px 5px 5px;
}
</style>

<body>

<?php

$uvalid = false;
$uid = 0;
$ulogin = "";
$umail = "";
$uregdate = "";
$uusername = "";
$uusername2 = "";
$uusername3 = "";
$ubday = "";
$ucity = "";
$utele = "";
$uhpage = "";
$ucountry = 0;
$uava = "";

$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql="SELECT USERID,USERLOGIN,USEREMAIL,USERREGISTERDATE,USERNAME,USERSECONDNAME,USERTHIRDNAME,USERBIRTHDAY,USERCITY,USERTELEPHONE,USERHOMEPAGE,USERCOUNTRY,USERAVATARURL FROM users ORDER BY USERID";
  
  if ($result=mysqli_query($con,$sql))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
		if($_GET['id']==$row[0])
		{
			$uvalid = true;
			
			$uid = $row[0];
			$ulogin = $row[1];
			$uusername = $row[4];
			$uusername2 = $row[5];
			$ubday = date_create_from_format('Y-m-d H:i:s', $row[7]);
			$uusername3 = $row[6];
			$umail = $row[2];
			$ucountry = $row[11]+1;
			$ucity = $row[8];
			$utele = $row[9];
			$uhpage = $row[10];
			$uava = $row[12];
			
			$sqlCountry="SELECT COUNTRYID,COUNTRYNAME,COUNTRYICON FROM countrys ORDER BY COUNTRYID";
			
			if ($result2=mysqli_query($con,$sqlCountry))
			  {
			    // Fetch one and one row
			    while ($row2=mysqli_fetch_row($result2))
				{
					if(intval($ucountry)==intval($row2[0]))
					{
						$ucountry = $row2[1];
						break;
					}
				}
				mysqli_free_result($result2);
			  }
			
			break;
		}
	}
	if($uvalid==false) {
		echo '<script language="javascript">';
		echo 'alert("Профиль с таким id не найден!");';
		echo '</script>';
		exit("ERROR");
	}
  mysqli_free_result($result);
  }

mysqli_close($con);
  
?>

<div class="ProfPage" id="ProfPage">

<p width=100%>
Информация о профиле <?php echo $ulogin." [ID: ".$uid."]";?></p>

<table border=1 width=100%>

<tr>
<td width=256px>
<img align=left <?php echo "src=\"".$uava."\""?> width=256px height=256px"> </img>
</td>
<td valign="top">
<p>Имя: 
<?php 
if($uusername=="") {
	echo 'Не указано';
} else {
	echo $uusername;
}
?>
</p>
<p>Фамилия: 
<?php 
if($uusername2=="") {
	echo 'Не указано';
} else {
	echo $uusername2;
}
?>
</p>
<p>Отчество: 
<?php 
if($uusername3=="") {
	echo 'Не указано';
} else {
	echo $uusername3;
}
?>
</p>
<p>Возраст: 
<?php 
if($ubday=="") {
	echo 'Не указано';
} else {
	$uspecoldbdate = new DateTime(date_format($ubday, 'Y-m-d'));
	$uspeccurdate = new DateTime(date('Y-m-d'));
	$uspecinterval = date_diff($uspecoldbdate, $uspeccurdate);
	
	echo $uspecinterval->format('%Y');
}
?>
</p>
<p>Email: 
<?php 
if($umail=="") {
	echo 'Не указано';
} else {
	echo $umail;
}
?>
</p>
<p>Страна: 
<?php 
	echo $ucountry;
?>
</p>
<p>Город: 
<?php 
if($ucity=="") {
	echo 'Не указано';
} else {
	echo $ucity;
}
?>
</p>
<p>Телефон: 
<?php 
if($utele=="") {
	echo 'Не указано';
} else {
	echo $utele;
}
?>
</p>
<p>Домашняя страница: 
<?php 
if($uhpage=="") {
	echo 'Не указано';
} else {
	echo $uhpage;
}
?>
</p>
</td>
</tr>

</table>

</div>


</body>