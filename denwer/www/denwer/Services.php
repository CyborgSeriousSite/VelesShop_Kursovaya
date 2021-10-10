<html>
<head></head>
<Body>

<form name=HiddenForm id=HiddenForm method=post>

<div name="ChoosenService">
<?php
if(isset($_POST['ConfirmSelectedU'])) {
	settype($_POST['UslugiBox'], string);
	$ihdn = $_POST['UslugiBox'];
	echo $ihdn;
} else {
	settype($_POST['ChoosenService'], string);
	$ihdn = $_POST['ChoosenService'];
	echo $ihdn;
}
?>
</div>
<div name="ChoosenCompany" id="ChoosenCompany">
<?php
if(!isset($_POST['ConfirmSelectedU'])) {
	echo "0";
}
?>
</div>

</form>

<form name=ViborgUslugi id=ViborgUslugi method=post
<?php
if(!isset($_POST['ConfirmSelectedU'])) {

} else {
	echo "hidden";
}
?>
>

<hr>

<h1>Услуги</h1>

<hr>

<h3>1. Выберите доступную услугу</h3>

<select name=UslugiBox id=UslugiBox">

<?php
$UslugiList = array();

$UslugiList[0] = "1. Замена деталей велосипеда";
$UslugiList[1] = "2. Замена деталей мотоблока";

for ($i=0;$i<count($UslugiList);$i++)
{
	echo "<option value=".$i.">".$UslugiList[$i]."</option>";
}
?>

</select>
<input type=submit name='ConfirmSelectedU' value='Далее'>

</form>

<form name=ZamenaDetaleiForm id=ZamenaDetaleiForm method=post 
<?php
if(!isset($_POST['ConfirmSelectedU'])) {
	echo "hidden";
}
?>
>

<hr>

<h2>Замена деталей велосипеда</h2>

<hr>

<table border=2>
<tr>
<td valign=top>
Доступные компании, предоставляющие данную услугу
</td>
<td id="UslugiCompanies">
<?php
$UslugiList = array();

$UslugiList[0] = "ООО ВелоПомощь";
$UslugiList[1] = "Подразделение Ereboro";
$UslugiList[2] = "Подразделение Velopair";

for ($i=0;$i<count($UslugiList);$i++)
{
	echo "<input type='button' name='ConfirmSelectedU' value='$UslugiList[$i]' onClick='Provider($i)'>";
}
?>
</td>
</tr>

<tr>

<td>
Выберите модель велосипеда
</td>
<td>
<select name=Velomodel id=Velomodel onchange="StartEvent(5);">
<?php
$VeloList = array();

$VeloList[0] = "STELS Navigator 600 MD";
$VeloList[1] = "STELS Miss 6100 MD";
$VeloList[2] = "Forward Talica 2.0 (2018)";
$VeloList[3] = "Forward Barcelona 1.0 (2018)";
$VeloList[4] = "Trek 7.4 FX 2015";
$VeloList[5] = "Trek Marlin 4 29 2017";
$VeloList[6] = "GT AGGRESSOR SPORT";

for ($i=0;$i<count($VeloList);$i++)
{
	echo "<option value=".$i.">".$VeloList[$i]."</option>";
}
?>
</select>
</td>

</tr>

<tr>
<td>
Выберите заменяемые детали
</td>
<td>
<select multiple name=Velodetail id=Velodetail onchange="CheckBag();StartEvent(5);">

<?php
$VeloDetailList = array();

$VeloDetailList[0] = "Сидение";
$VeloDetailList[1] = "Багажник";
$VeloDetailList[2] = "Руль";
$VeloDetailList[3] = "Колесо";
$VeloDetailList[4] = "Педали";
$VeloDetailList[5] = "Цепь";
$VeloDetailList[6] = "Корпус";

for ($i=0;$i<count($VeloDetailList);$i++)
{
	echo "<option id='Detail".$i."' value=".$i.">".$VeloDetailList[$i]."</option>";
}
?>

</select>
</td>

</tr>

<tr>
<td>
Забрать велосипед после замены
</td>
<td>
<input type="radio" id="AfterUVVivoz" name="AfterUV" checked onchange="StartEvent(5);">Самовывоз</input>
<input type="radio" id="AfterUVDostavka" name="AfterUV" onchange="StartEvent(5);">Доставка</input>
</td>

</tr>

<tr id="adressDostavkiVelika" hidden>
<td>
Ваш адрес (ДЛЯ ДОСТАВКИ)
</td>
<td>
<input name="VivozStreet" onChange="StartEvent(5);"></input>
</td>

</tr>

<tr>
<td>
Дополнительные способы оповещения о законченой работе
</td>
<td>
<input type="checkbox" id="VEmailNotification" name="AfterUV" onChange="StartEvent(5);">E-mail</input>
<input type="checkbox" id="VTelephoneNotification" name="AfterUV" onChange="StartEvent(5);">телефон</input>
</td>

</tr>

<tr id="DopTelephone" hidden>
<td>
Дополнительный телефон <font color=red>*</font>
</td>
<td>
<input onChange="StartEvent(5);" id="AdditionalTelephone"></input>
</td>

</tr>

<tr id="dopemail" hidden>
<td>
Дополнительный e-mail <font color=red>*</font>
</td>
<td>
<input onChange="StartEvent(5);" id="AdditionalEmail"></input>
</td>

</tr>

<tr>
<td id=OutputForVelic colspan=2 valign=top>
</td>
</tr>
</table>

<input width=50% type='button' id='ConfirmUsluguV' value='Подтвердить' onClick='StartEvent(6);'>
<input width=50% type='button' id='CancelUsluguV' value='Назад' onClick='StartEvent(7);'>

</form>

<form name=UslugaOformlenaform id=UslugaOformlenaform method=post hidden>

<hr>

<table width=100%>
<tr>
<td valign=center width=65%>
<h2 align=right>Услуга успешно оформлена!</h2>
</td>
<td valign=center width=35%>
<img src="img1/RegistryCheck.png" width="80" height="50" alt="Registy Successful"/>
</td>
</tr>
</table>

<hr>

</form>

<script language=JavaScript>

var
VeloList = new Array(6);
VeloDetailList = new Array(6);

VeloList[0] = new Array(8);
VeloList[0][0] = "STELS Navigator 600 MD";
VeloList[0][1] = "750"; //Сидение
VeloList[0][2] = "-1"; //Багажник
VeloList[0][3] = "5000"; //Руль
VeloList[0][4] = "3250"; //Колесо
VeloList[0][5] = "600"; //Педали
VeloList[0][6] = "400"; //Цепь
VeloList[0][7] = "10000"; //Корпус


VeloList[1] = new Array(8);
VeloList[1][0] = "STELS Miss 6100 MD";
VeloList[1][1] = "700"; //Сидение
VeloList[1][2] = "-1"; //Багажник
VeloList[1][3] = "4250"; //Руль
VeloList[1][4] = "4000"; //Колесо
VeloList[1][5] = "500"; //Педали
VeloList[1][6] = "400"; //Цепь
VeloList[1][7] = "9000"; //Корпус

VeloList[2] = new Array(8);
VeloList[2][0] = "Forward Talica 2.0 (2018)";
VeloList[2][1] = "500"; //Сидение
VeloList[2][2] = "375"; //Багажник
VeloList[2][3] = "3800"; //Руль
VeloList[2][4] = "4100"; //Колесо
VeloList[2][5] = "480"; //Педали
VeloList[2][6] = "280"; //Цепь
VeloList[2][7] = "7000"; //Корпус

VeloList[3] = new Array(8);
VeloList[3][0] = "Forward Barcelona 1.0 (2018)";
VeloList[3][1] = "777"; //Сидение
VeloList[3][2] = "425"; //Багажник
VeloList[3][3] = "4175"; //Руль
VeloList[3][4] = "5500"; //Колесо
VeloList[3][5] = "700"; //Педали
VeloList[3][6] = "325"; //Цепь
VeloList[3][7] = "9000"; //Корпус

VeloList[4] = new Array(8);
VeloList[4][0] = "Trek 7.4 FX 2015";
VeloList[4][1] = "500"; //Сидение
VeloList[4][2] = "-1"; //Багажник
VeloList[4][3] = "3700"; //Руль
VeloList[4][4] = "4750"; //Колесо
VeloList[4][5] = "650"; //Педали
VeloList[4][6] = "400"; //Цепь
VeloList[4][7] = "10000"; //Корпус

VeloList[5] = new Array(8);
VeloList[5][0] = "Trek Marlin 4 29 2017";
VeloList[5][1] = "500"; //Сидение
VeloList[5][2] = "-1"; //Багажник
VeloList[5][3] = "3500"; //Руль
VeloList[5][4] = "4500"; //Колесо
VeloList[5][5] = "600"; //Педали
VeloList[5][6] = "390"; //Цепь
VeloList[5][7] = "8500"; //Корпус

VeloList[6] = new Array(8);
VeloList[6][0] = "GT AGGRESSOR SPORT";
VeloList[6][1] = "500"; //Сидение
VeloList[6][2] = "-1"; //Багажник
VeloList[6][3] = "4000"; //Руль
VeloList[6][4] = "4900"; //Колесо
VeloList[6][5] = "800"; //Педали
VeloList[6][6] = "450"; //Цепь
VeloList[6][7] = "9250"; //Корпус

VeloDetailList[0]="Сидение";
VeloDetailList[1]="Багажник";
VeloDetailList[2]="Руль";
VeloDetailList[3]="Колесо";
VeloDetailList[4]="Педали";
VeloDetailList[5]="Цепь";
VeloDetailList[6]="Корпус";

function CheckBag() {
	switch(document.getElementById('Velomodel').selectedIndex) {
		<?php echo "case '0': ChangeDetail(1, 0); break;"; ?>
		<?php echo "case '1': ChangeDetail(1, 0); break;"; ?>
		<?php echo "case '2': ChangeDetail(1, 1); break;"; ?>
		<?php echo "case '3': ChangeDetail(1, 1); break;"; ?>
		<?php echo "case '4': ChangeDetail(1, 0); break;"; ?>
		<?php echo "case '5': ChangeDetail(1, 0); break;"; ?>
		<?php echo "case '6': ChangeDetail(1, 0); break;"; ?>
	}
}

function ChangeDetail(idD,stateD)
{
	if(stateD==0) {
		document.getElementById("Detail"+idD).innerHTML= "";
	} else {
		document.getElementById("Detail"+idD).style.display = 'block';
	}
}


function StartEvent(eventID)
{
	if(eventID==5) {
	document.getElementById("OutputForVelic").style.display = 'table-row';
    document.getElementById('OutputForVelic').innerHTML="<h3>ЧЕК</h3>";
    document.getElementById('OutputForVelic').innerHTML+="<p>Услуга: Замена деталей велосипеда</p><p>Компания, предоставляющая услугу:" + document.getElementById('UslugiCompanies').options[document.getElementById('ChoosenCompany').value].text + "</p>";
    document.getElementById('OutputForVelic').innerHTML+="<p>Модель велосипеда:"+VeloList[document.getElementById('Velomodel').selectedIndex][0]+"</p>";
	
	if(document.getElementById('VEmailNotification').checked) {
		document.getElementById('OutputForVelic').innerHTML+="<p>Дополнительный email: "+document.getElementById("AdditionalEmail").value+"</p>";
	}
	
	if(document.getElementById('VTelephoneNotification').checked) {
		document.getElementById('OutputForVelic').innerHTML+="<p>Дополнительный телефон: +"+document.getElementById("AdditionalTelephone").value+"</p>";
	}
	
	var listDetails = document.getElementById('Velodetail').options;
	var ItogoSum = 0;
	
	if(listDetails.length>0) {
		
		document.getElementById('OutputForVelic').innerHTML+="<p>Детали на замену:</p><ul>";
		
		for(var i=0;i<listDetails.length;i++)
		{
			if(document.getElementById('Velodetail').options[i].selected) {
				document.getElementById('OutputForVelic').innerHTML+="<li>"+document.getElementById('Velodetail').options[i].text+ " - " + getPrice(document.getElementById('Velomodel').selectedIndex, document.getElementById('Velodetail').options[i].text) + "</li>";	
				ItogoSum+=parseFloat(getPrice(document.getElementById('Velomodel').selectedIndex, document.getElementById('Velodetail').options[i].text));
			}
		}
		
		document.getElementById('OutputForVelic').innerHTML+="<p>Стоймость всех замен: " + ItogoSum + " руб.</p>";
		
		if(document.getElementById('AfterUVDostavka').checked) {
			document.getElementById('OutputForVelic').innerHTML+="<p>Cтоймость доставки: 450 руб.</p>";
			document.getElementById('OutputForVelic').innerHTML+="<p>Итого: " + (ItogoSum+450) + " руб.</p>";
		} else {
			document.getElementById('OutputForVelic').innerHTML+="<p>Cтоймость доставки: 0 руб. (Самовывоз)</p>";
			document.getElementById('OutputForVelic').innerHTML+="<p>Итого: " + ItogoSum + " руб.</p>";
		}
	
		
	}
	
    document.getElementById('OutputForVelic').innerHTML+="</ul>";
	
	}
	
}

function Provider(indexProv) {
  document.getElementById('ChoosenCompany').innerHTML=indexProv;
}

function indToTextComp(indCom) {
	case 0:
}

function getPrice(Id, ProductName) {

    var priceMultiplier = 1.0;
	
	switch(document.getElementById('ChoosenCompany').value) {
		case 0: priceMultiplier=1.0;break;
		case 1: priceMultiplier=1.25;break;
		case 2: priceMultiplier=1.5;break;
	}

	switch(ProductName) {
		case "Сидение": return (VeloList[Id][1]*priceMultiplier) + " руб.";
		case "Багажник": return (VeloList[Id][2]*priceMultiplier) + " руб.";
		case "Руль": return (VeloList[Id][3]*priceMultiplier) + " руб.";
		case "Колесо": return (VeloList[Id][4]*priceMultiplier) + " руб.";
		case "Педали": return (VeloList[Id][5]*priceMultiplier) + " руб.";
		case "Цепь": return (VeloList[Id][6]*priceMultiplier) + " руб.";
		case "Корпус": return (VeloList[Id][7]*priceMultiplier) + " руб.";
		default: return "N/a руб.";
	}
}

</script>

</Body>
</html>