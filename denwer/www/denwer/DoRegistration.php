<BODY>
<header class="header">
<h1 align="center">Регистрация</h1>
</header>

<div class="pageReg">

<div id="DoRegForm">

<div id="PreRegInfo">
<div align="center">
<font color="red"><b id="MistakeField"></b></font>
</div>
<hr>

</div>

<table border=0 width="42%" align="center">
<tr>

<td>
Логин <font color="red">*</font>:
</td>

<td>
<input maxlength=16 id="RegLogin" class="inputSearch"></input>
</td>

</tr>

<tr>
<td>
Пароль <font color="red">*</font>:
</td>

<td>
<input maxlength=16 id="RegPassword" class="inputSearch"></input>
</td>
</tr>

<tr>
<td>
E-Mail <font color="red">*</font>:
</td>

<td>
<input maxlength=16 id="RegEMail" class="inputSearch"></input>
</td>
</tr>

<tr>
<td>
Имя:
</td>

<td>
<input maxlength=16 id="RegName" class="inputSearch"></input>
</td>
</tr>

<tr>
<td>
Фамилия:
</td>

<td>
<input maxlength=16 id="RegSecName" class="inputSearch"></input>
</td>
</tr>

<tr>
<td>
Отчество:
</td>

<td>
<input maxlength=16 id="RegThirdName" class="inputSearch"></input>
</td>
</tr>

<tr>
<td>
Дата рождения<font color="red">*</font>:
</td>

<td>
<select id="RegYear" onchange="LoadDays();" class="inputSearch4"></select>
<select id="RegMonth" onchange="LoadDays();" class="inputSearch4"></select>
<select id="RegDay" class="inputSearch4"></select>
</td>
</tr>

<tr>
<td>
Страна <font color="red">*</font>:
</td>

<td>
<select id=CountrySelect onchange="changeCountryFlag()" class="inputSearch3">
<?php

require 'CountryListData.php';

?>
</select>
<span id="RegFlagICON">
</span>
</td>
</tr>

<tr>
<td>
Город:
</td>

<td>
<input maxlength=16 id="CityReg" class="inputSearch"></input>
</td>
</tr>

<tr>
<td>
Контактный номер:
</td>

<td>
<input id="RegPhone" maxlength=16 class="inputSearch" onChange="AuthAvailability()">
<script>
$(function(){
  $("#RegPhone").mask("+7(999) 999-9999");
});
</script>
</input>
</td>
</tr>

<tr>
<td>
Домашняя страница:
</td>

<td>
<input maxlength=16 id="HomepageReg" class="inputSearch"></input>
</td>
</tr>

<tr>
<td>
URL адрес аватара:
</td>

<td>
<input maxlength=128 id="AvaUrlReg" class="inputSearch"></input>
</td>

</tr>

<tr>
<td>
<input type="checkbox" id="DoubleAuth" name="DoubleAuth" value="0">
<label for="DoubleAuth">Двойная аутентификация</label>
</td>

<td>
<input type="checkbox" id="HideEmail" name="HideEmail" value="0">
<label for="HideEmail">Скрыть адрес почты</label>
</td>

</tr>

<tr>
<td>
Политика конфиденциальности <font color="red">*</font>:
</td>

<td>
<input type="checkbox" id="PrivacyAcception" name="PrivacyAcception" value="0">
<label for="PrivacyAcception">Согласен с политикой конфиденциальности сайта</label>
</td>

</tr>

<tr>
<td>
Пользовательское соглашение <font color="red">*</font>:
</td>

<td>
<input type="checkbox" id="TermsOfUseAcception" name="TermsOfUseAcception" value="0">
<label for="TermsOfUseAcception">Я принимаю пользовательское соглашение</label>
</td>

</tr>

</table>

<div align="center" class="g-recaptcha" data-sitekey="6Lc5hFoUAAAAAIrvKv8gNUscxcoNC64slo0gQtOY"></div>

<table border=0 align="center">
<tr>
<td>
<input type="button" onclick="ValidateRegistration();" value="Регистрация">
</td>
<td>
<input type="button" id="BtnBackReg" value="Вернуться на главную" onclick="location.href = '/denwer/index.php?page=main'">
</td>
</tr>
</table>

</div>

<div id="RegisteredForm"

<?php
	if(!(isset($_GET['SucessfullRegistered'])))
	{
		echo "hidden";
	}
?>

>
<hr>
<h2 align="center">Пользователь успешно зарегистрирован!</h2>
<p align="center">На вашу почту было отправлено письмо с активацией зарегистрированного пользователя!</p>
<hr>
</div>

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