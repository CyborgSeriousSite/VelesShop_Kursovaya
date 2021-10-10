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

<h2>Контакты</h2>
<hr>
<h3>Вопросы по заказам и заключению договоров, запросить коммерческое предложение (заявка на формирование счета)</h3>
<p style="white-space: pre-line;">Ярославская область, Контакт-центр (многоканальный): 8 (4852) 19-39-44

Единый Контакт-центр (многоканальный): 8(800)200-33-83 (звонок по России бесплатный)
E-mail: call-center@velesshop.ru
Время работы: Пн.-Пт. — 7:00-21:00 Сб.-Вс. — 9:00-18:00 по московскому времени
Все обращения от Юридических лиц по вопросам сотрудничества, предоставления коммерческих предложений и вопросам ценообразования рассматриваются при наличии реквизитов компании. 
</p>
<hr>
<h3>Вопросы о наличии и характеристиках товаров в магазинах</h3>
<p style="white-space: pre-line;">Информационно-справочная служба компании «Велес» 8(800)500-02-77

E-mail: info-online@velesshop.ru
Время работы: в рабочие дни 9:00 — 18:00
Если Вы хотите узнать, в каком магазине есть интересующий Вас товар, уточнить характеристики товара, или у Вас возникли другие вопросы, не связанные с работой Интернет-магазина, — обращайтесь в Информационно-справочную службу нашей компании. Все обращения от Юридических лиц по вопросам сотрудничества, предоставления коммерческих предложений и вопросам ценообразования рассматриваются при наличии реквизитов компании.
</p>
<hr>
<h3>Рекламации по товару и жалобы по заказам</h3>
<p style="white-space: pre-line;">Сервис-центр компании «Велес» 8(800)500-02-78 (Звонок по России бесплатный)

E-mail: service-online@velesshop.ru
Время работы: в рабочие дни 9:00 — 18:00
Если у Вас есть замечания по приобретенным товарам или качеству обслуживания обращайтесь в сервис-центр нашей компании.
</p>
<hr>
<h3>Вопросы по работе интернет-магазина</h3>
<p style="white-space: pre-line;">Служба технической поддержки интернет-магазина компании «Велес»
8(800)500-02-79
E-mail: help-online@velesshop.ru
Время работы: в рабочие дни 9:00 — 18:00
Вам нужна помощь при оформлении покупки, есть вопросы по заказу, хотите восстановить утерянный пароль или у Вас возникли другие вопросы по работе интернет-магазина www.velesshop.ru, не связанные с консультацией по товару — обратитесь в службу технической поддержки.
</p>
<hr>

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