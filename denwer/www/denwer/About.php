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

<h2>Это Велес</h2>
<b>О компании Велес</b>
<br>
<p>Компания Велес — новый российский частный интернет-магазин, специализирующийся на канцтоварах. Дистрибьюторская сеть компании охватывает свыше 50 пунктов продаж разного формата более чем в 70 городах страны.</p>
<br>
<p>Наш сайт обладает множеством функции, предлагает широкий ассортимент канцелярских товаров.</p>
<br>
<b>Преимущества</b>
<br>
<p>Клиент — это главное лицо, принимающее решение о том, как, когда и где оформить заказ и получить покупки. Наши возможности позволяют получать ваши заказы прямо в день их оформления. Мы гарантируем высокое качество товаров и услуг и безупречный сервис.</p>

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