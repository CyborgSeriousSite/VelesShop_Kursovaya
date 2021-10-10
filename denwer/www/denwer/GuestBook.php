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

<h3 align="center">Книга отзывов</h3>

<table class="page2" width="32%" height="500px">

<tr height="80%">
	<td>
		<table class="guestbookcontent roundup" width="100%" height="100%">
		<tr valign="top">
		
		<td id="guestbposts" class="contentwithscroll">
		
		<?php
		require 'GuestBookPosts.php';
		?>
			
		</td>
		
		</tr>
		</table>
	</td>
</tr>

<tr>
	<td>
		<table class="guestbookcontent rounddown" width="100%" height="100%">
		<tr>
		
		<td align="center">
		<textarea class="userpostpreform" id="guestbookinput" cols="50" rows="5"></textarea>
		</td>
		
		</tr>
		<tr>
		
		<td align="center">
		<input type="button" value="Отправить" onclick="PostMessageInGuestBook();"></input>
		</td>
		
		</tr>
		</table>
	</td>
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