<?php
	session_start();
    if ($_SESSION["Username"] == null)
	{
		$_SESSION["Username"] = "guest";
	}
?>

<HTML><HEAD>
<script type="text/javascript" src="jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript" src="MainScript.js"></script>
<link rel="stylesheet" href="Styles.css">

<TITLE>
</TITLE>
</HEAD>

<?php

$ppPid = $_GET['id'];
$ppPName = "";
$ppPDesc = "";
$ppPFeat = "";
$ppPPic = "";

$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sqlProducts="SELECT PRODUCTID,PRODUCTNAME,PRODUCTDESC,PRODUCTFEATURES,PRODUCTPIC FROM products ORDER BY PRODUCTID";

if ($result=mysqli_query($con,$sqlProducts))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
		if($ppPid==$row[0]) {
			$ppPName=$row[1];
			$ppPDesc=$row[2];
			$ppPFeat=$row[3];
			$ppPPic=$row[4];
		}
	}
	mysqli_free_result($result);
  }



?>



<BODY>

<form id="LoginForm" class="LoginForm" style="display:none">

<div class="LoginBox" id="LoginBox">
<table border=0 width=100%>
<tr>

<td>
<span class="LoginWindowLabel">Вход</span>
</td>

<td>
<img align=right src="images/CloseIcon.png" width=20px height=20px onClick="ToggleLogin();"> </img>
</td>

</tr>
</table>
<hr>
<div class="LoginBoxContent">
<table width=100% height=77%>
<tr>

<td width=17%>
Логин
<br>
<br>
Пароль
</td>

<td>
<input class="LoginWindowInput" maxlength=16 id="LBoxLogin"></input>
<br>
<br>
<input class="LoginWindowInput" type="password" maxlength=16 id="LBoxPassword"></input>
</td>

</tr>

<tr>

<td colspan=2>
<input type="checkbox" id="NotMineComputerL" name="NotMineComputerL" value="0">
<label for="NotMineComputerL">Чужой компьютер</label><a class="LoginWindowLabel02">Не можете войти?</a>
</td>

</tr>

</tr>

<tr>

<td colspan=1 rowspan=1>
<input type="button" id="LogBoxLoginBtn" value="Войти" onclick="LoginRequest();" class="LoginWindowInput2">
</td>

<td colspan=1 rowspan=1 id="LoginWindowOutput">

</td>

</tr>

</table>
</div>
</div>

</form>

<form class="prepage">
<header class="header">
<table width="100%">
<tr>

<td width="150px">
<img src="images\LogoSmall.png" width="128px">
</img>
</td>

<td>
<table border=0>
<tr>

<td class="MenuItem" onclick="PageNavigation(0);">
Главная страница
</td>

<td class="MenuItem" onclick="PageNavigation(1);">
О сайте
</td>

<td class="MenuItem" onclick="PageNavigation(2);">
Контакты
</td>

<td class="MenuItem" onclick="PageNavigation(3);">
Книга отзывов
</td>

</tr>
</table>
</td>

<td align="center" class="cartbutton" width=42 height=16>
<a href="/denwer/index.php?page=cart">
<img src="images\cart.png" width=16 height=16 class="CartIcon"></img>
<span class="CartCount" id="CartCount" 
<?php 
if(count($_SESSION['Cart'])<1) {
	echo "style=\"visibility: hidden;\"";
}
?>
>

<?php
echo count($_SESSION['Cart']);
?>
</span>
</a>
</td>



<?php

	if($_SESSION["Username"]=="guest") {
		
	echo "
	<td align=\"right\">
	<a href=\"/denwer/index.php?page=registration\">Регистрация</a>
	<span>|</span>
	<a onClick=\"ToggleLogin();\">Вход</a>
	</td>
	";
		
	} else {
		
	echo "
	<td align=\"right\">
	<span>Добрый день, </span>
	<a onClick=\"MyWindow=window.open('/denwer/profile.php?id=".$_SESSION["UserID"]."','MyWindow','width=800,height=350'); return false;\" href=\"#\">".$_SESSION["Username"]."</a>
	<span>|</span>
    <a href=\"\" onclick=\"Logout();\">Выйти</a>
	</td>
	";
		
	}

?>

</tr>
</table>
</header>

<div class="page">

<table border=0 class="ProductionBox_O" width=100% id="ProductionBox">

<tr>
<td>
<hr>
<?php
echo $ppPName;
?>
<hr>
</td>
</tr>

<tr>
<td>

<table border=1 width=100%>

<tr width=100%>
<td width=256px height=256px align=center bgcolor=white>
<img 
<?php
echo "src=\"".$ppPPic."\"";
?>
 width=256px height=256px>
</img>
</td>
<td valign=top>
<p class="pppitem"><b>Описание:</b></p>
<p class="pppitem">
<?php
echo $ppPDesc;
?>
<p class="pppitem"><b>Характеристики:</b></p>
<p class="pppitem">
<?php
echo "Код: ".$ppPid;
?>
</p>
<p class="pppitem2" style="white-space: pre">
<?php
echo $ppPFeat;
?>
</p>
<p class="pppitem"><b>Стоймость:</b> 200 руб.</p>
<?php
echo "

<table><tr>
<td class=\"CountProductInputTD\">
<input id=\"InputNewProducts_".$ppPid."\" class=\"CountProductInput\" size=\"1\" type=\"number\" value=\"1\" min=\"1\" size=\"1\" align=\"left\" />
</td>
<td align=\"left\">
<span id=\"SpanNewProducts_".$ppPid."\" class=\"SendToCartButton\" onclick=\"AddToCart(this.id);\">В корзину</span>
</td>
</tr></table>

";
?>
</td>
</tr>

</table>

</td>
</tr>


</table>

</div>
</form>

<footer align="center">
<div>
Powered by Cyborg aka Захар Переруков
</div>
<div>
All rights reserved 2018 (c)
</div>
</footer>

</BODY>

</HTML>