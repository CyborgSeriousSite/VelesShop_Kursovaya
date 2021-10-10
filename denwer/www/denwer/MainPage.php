<BODY>
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
	<a href=\"/denwer/index.php?page=registration\" class=\"aNoDecLink\">Регистрация</a>
	<span>|</span>
	<a class=\"aNoDecLink\" onClick=\"ToggleLogin();\">Вход</a>
	</td>
	";
		
	} else {
		
	echo "
	<td align=\"right\">
	<span>Добрый день, </span>
	<a class=\"aNoDecLink\" onClick=\"MyWindow=window.open('/denwer/profile.php?id=".$_SESSION["UserID"]."','MyWindow','width=800,height=350'); return false;\" href=\"#\">".$_SESSION["Username"]."</a>
	<span>|</span>
    <a class=\"aNoDecLink\" href=\"\" onclick=\"Logout();\">Выйти</a>
	</td>
	";
		
	}

?>

</tr>
</table>
</header>

<div class="page">

<table border=0 width="100%" class="searchbox">

<tr>

<td class="inputSearch">
<input oninput="SearchListInput();" class="inputSearch2" id="title-search-input" type="text" name="q" maxlength="50" autocomplete="off" value="" placeholder="Введите название товара, например: Бумага A4">
</td>

<td>
<div class="searchbutton clickableObj" id="searchbutton" onclick="ShowSList();">Найти</div>
</td>

</tr>

</table>

<table border=0 class="searchlist" id="searchlist" style="display: none;">

<?php
require 'searchboxlist.php';
?>


</table>

<hr>

<table border=0 class="ProductionBox" id="ProductionBox">

<tr>
<td colspan=8>
<h3>НОВИНКИ КАНЦЕЛЯРИИ</h3>
<hr>
</td>
</tr>

<tr>
<?php
require 'newproducts.php';
?>
</tr>

</table>

<table border=0 class="ProductionBox2" id="ProductionBox2">

<tr>
<td colspan=8>
<h3>СКИДКИ</h3>
<hr>
</td>
</tr>

<tr>
<?php
require 'discounts.php';
?>
</tr>

</table>

<table border=0 class="ProductionBox3" id="ProductionBox3">

<tr>
<td colspan=8>
<h3>РЕКОМЕНДУЕМОЕ</h3>
<hr>
</td>
</tr>

<tr>
<?php
require 'recomended.php';
?>
</tr>

</table>

</div>

<footer align="center">
<div>
Powered by Cyborg aka Захар Переруков
</div>
<div>
All rights reserved 2018 (c)
</div>
</footer>

</BODY>