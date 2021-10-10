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
<script type="text/javascript" src="MainScript.js?v=4"></script>
<link rel="stylesheet" href="Styles.css">
  
<TITLE>
<?php
if($_GET['page'] == "main")
{
echo "Велес - Главная страница";
}

if($_GET['page'] == "cart")
{
echo "Велес - Корзина покупок";
}
if($_GET['page'] == "product")
{
echo "Велес - Информация о продукте";
}
if($_GET['page'] == "registration")
{
echo "Велес - Регистрация пользователей";
}
if($_GET['page'] == "guestbook")
{
echo "Велес - Книга отзывов";
}
if($_GET['page'] == "about")
{
echo "Велес - О компании";
}
?>

</TITLE></HEAD>

<body>

<form id="LoginForm" class="LoginForm" style="display:none">

<div class="LoginBox" id="LoginBox">
<table border=0 width=100%>
<tr>

<td>
<span class="LoginWindowLabel">Вход</span>
</td>

<td>
<img align=right src="images/CloseIcon.png" width=20px height=20px onClick="ToggleLogin();" class="clickableObj"> </img>
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
<input type="button" id="LogBoxLoginBtn" value="Войти" onclick="LoginRequest();" class="LoginWindowInput2 clickableObj">
</td>

<td colspan=1 rowspan=1 id="LoginWindowOutput">

</td>

</tr>

</table>
</div>
</div>

</form>

<form class="prepage">
<?php
if($_GET['page'] == "main")
{
require 'MainPage.php';
} else if($_GET['page'] == "cart")
{
require 'CartPage.php';
} else if($_GET['page'] == "registration")
{
require 'DoRegistration.php';
} else if($_GET['page'] == "product")
{
require 'ProductPage.php';
} else if($_GET['page'] == "guestbook")
{
require 'GuestBook.php';
} else if($_GET['page'] == "about")
{
require 'About.php';
} else if($_GET['page'] == "contacts")
{
require 'Contacts.php';
} else {
require 'MainPage.php';
}
?>
</form>

</body>

</HTML>