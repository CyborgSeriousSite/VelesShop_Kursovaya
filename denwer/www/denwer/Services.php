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

<h1>������</h1>

<hr>

<h3>1. �������� ��������� ������</h3>

<select name=UslugiBox id=UslugiBox">

<?php
$UslugiList = array();

$UslugiList[0] = "1. ������ ������� ����������";
$UslugiList[1] = "2. ������ ������� ���������";

for ($i=0;$i<count($UslugiList);$i++)
{
	echo "<option value=".$i.">".$UslugiList[$i]."</option>";
}
?>

</select>
<input type=submit name='ConfirmSelectedU' value='�����'>

</form>

<form name=ZamenaDetaleiForm id=ZamenaDetaleiForm method=post 
<?php
if(!isset($_POST['ConfirmSelectedU'])) {
	echo "hidden";
}
?>
>

<hr>

<h2>������ ������� ����������</h2>

<hr>

<table border=2>
<tr>
<td valign=top>
��������� ��������, ��������������� ������ ������
</td>
<td id="UslugiCompanies">
<?php
$UslugiList = array();

$UslugiList[0] = "��� ����������";
$UslugiList[1] = "������������� Ereboro";
$UslugiList[2] = "������������� Velopair";

for ($i=0;$i<count($UslugiList);$i++)
{
	echo "<input type='button' name='ConfirmSelectedU' value='$UslugiList[$i]' onClick='Provider($i)'>";
}
?>
</td>
</tr>

<tr>

<td>
�������� ������ ����������
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
�������� ���������� ������
</td>
<td>
<select multiple name=Velodetail id=Velodetail onchange="CheckBag();StartEvent(5);">

<?php
$VeloDetailList = array();

$VeloDetailList[0] = "�������";
$VeloDetailList[1] = "��������";
$VeloDetailList[2] = "����";
$VeloDetailList[3] = "������";
$VeloDetailList[4] = "������";
$VeloDetailList[5] = "����";
$VeloDetailList[6] = "������";

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
������� ��������� ����� ������
</td>
<td>
<input type="radio" id="AfterUVVivoz" name="AfterUV" checked onchange="StartEvent(5);">���������</input>
<input type="radio" id="AfterUVDostavka" name="AfterUV" onchange="StartEvent(5);">��������</input>
</td>

</tr>

<tr id="adressDostavkiVelika" hidden>
<td>
��� ����� (��� ��������)
</td>
<td>
<input name="VivozStreet" onChange="StartEvent(5);"></input>
</td>

</tr>

<tr>
<td>
�������������� ������� ���������� � ���������� ������
</td>
<td>
<input type="checkbox" id="VEmailNotification" name="AfterUV" onChange="StartEvent(5);">E-mail</input>
<input type="checkbox" id="VTelephoneNotification" name="AfterUV" onChange="StartEvent(5);">�������</input>
</td>

</tr>

<tr id="DopTelephone" hidden>
<td>
�������������� ������� <font color=red>*</font>
</td>
<td>
<input onChange="StartEvent(5);" id="AdditionalTelephone"></input>
</td>

</tr>

<tr id="dopemail" hidden>
<td>
�������������� e-mail <font color=red>*</font>
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

<input width=50% type='button' id='ConfirmUsluguV' value='�����������' onClick='StartEvent(6);'>
<input width=50% type='button' id='CancelUsluguV' value='�����' onClick='StartEvent(7);'>

</form>

<form name=UslugaOformlenaform id=UslugaOformlenaform method=post hidden>

<hr>

<table width=100%>
<tr>
<td valign=center width=65%>
<h2 align=right>������ ������� ���������!</h2>
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
VeloList[0][1] = "750"; //�������
VeloList[0][2] = "-1"; //��������
VeloList[0][3] = "5000"; //����
VeloList[0][4] = "3250"; //������
VeloList[0][5] = "600"; //������
VeloList[0][6] = "400"; //����
VeloList[0][7] = "10000"; //������


VeloList[1] = new Array(8);
VeloList[1][0] = "STELS Miss 6100 MD";
VeloList[1][1] = "700"; //�������
VeloList[1][2] = "-1"; //��������
VeloList[1][3] = "4250"; //����
VeloList[1][4] = "4000"; //������
VeloList[1][5] = "500"; //������
VeloList[1][6] = "400"; //����
VeloList[1][7] = "9000"; //������

VeloList[2] = new Array(8);
VeloList[2][0] = "Forward Talica 2.0 (2018)";
VeloList[2][1] = "500"; //�������
VeloList[2][2] = "375"; //��������
VeloList[2][3] = "3800"; //����
VeloList[2][4] = "4100"; //������
VeloList[2][5] = "480"; //������
VeloList[2][6] = "280"; //����
VeloList[2][7] = "7000"; //������

VeloList[3] = new Array(8);
VeloList[3][0] = "Forward Barcelona 1.0 (2018)";
VeloList[3][1] = "777"; //�������
VeloList[3][2] = "425"; //��������
VeloList[3][3] = "4175"; //����
VeloList[3][4] = "5500"; //������
VeloList[3][5] = "700"; //������
VeloList[3][6] = "325"; //����
VeloList[3][7] = "9000"; //������

VeloList[4] = new Array(8);
VeloList[4][0] = "Trek 7.4 FX 2015";
VeloList[4][1] = "500"; //�������
VeloList[4][2] = "-1"; //��������
VeloList[4][3] = "3700"; //����
VeloList[4][4] = "4750"; //������
VeloList[4][5] = "650"; //������
VeloList[4][6] = "400"; //����
VeloList[4][7] = "10000"; //������

VeloList[5] = new Array(8);
VeloList[5][0] = "Trek Marlin 4 29 2017";
VeloList[5][1] = "500"; //�������
VeloList[5][2] = "-1"; //��������
VeloList[5][3] = "3500"; //����
VeloList[5][4] = "4500"; //������
VeloList[5][5] = "600"; //������
VeloList[5][6] = "390"; //����
VeloList[5][7] = "8500"; //������

VeloList[6] = new Array(8);
VeloList[6][0] = "GT AGGRESSOR SPORT";
VeloList[6][1] = "500"; //�������
VeloList[6][2] = "-1"; //��������
VeloList[6][3] = "4000"; //����
VeloList[6][4] = "4900"; //������
VeloList[6][5] = "800"; //������
VeloList[6][6] = "450"; //����
VeloList[6][7] = "9250"; //������

VeloDetailList[0]="�������";
VeloDetailList[1]="��������";
VeloDetailList[2]="����";
VeloDetailList[3]="������";
VeloDetailList[4]="������";
VeloDetailList[5]="����";
VeloDetailList[6]="������";

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
    document.getElementById('OutputForVelic').innerHTML="<h3>���</h3>";
    document.getElementById('OutputForVelic').innerHTML+="<p>������: ������ ������� ����������</p><p>��������, ��������������� ������:" + document.getElementById('UslugiCompanies').options[document.getElementById('ChoosenCompany').value].text + "</p>";
    document.getElementById('OutputForVelic').innerHTML+="<p>������ ����������:"+VeloList[document.getElementById('Velomodel').selectedIndex][0]+"</p>";
	
	if(document.getElementById('VEmailNotification').checked) {
		document.getElementById('OutputForVelic').innerHTML+="<p>�������������� email: "+document.getElementById("AdditionalEmail").value+"</p>";
	}
	
	if(document.getElementById('VTelephoneNotification').checked) {
		document.getElementById('OutputForVelic').innerHTML+="<p>�������������� �������: +"+document.getElementById("AdditionalTelephone").value+"</p>";
	}
	
	var listDetails = document.getElementById('Velodetail').options;
	var ItogoSum = 0;
	
	if(listDetails.length>0) {
		
		document.getElementById('OutputForVelic').innerHTML+="<p>������ �� ������:</p><ul>";
		
		for(var i=0;i<listDetails.length;i++)
		{
			if(document.getElementById('Velodetail').options[i].selected) {
				document.getElementById('OutputForVelic').innerHTML+="<li>"+document.getElementById('Velodetail').options[i].text+ " - " + getPrice(document.getElementById('Velomodel').selectedIndex, document.getElementById('Velodetail').options[i].text) + "</li>";	
				ItogoSum+=parseFloat(getPrice(document.getElementById('Velomodel').selectedIndex, document.getElementById('Velodetail').options[i].text));
			}
		}
		
		document.getElementById('OutputForVelic').innerHTML+="<p>��������� ���� �����: " + ItogoSum + " ���.</p>";
		
		if(document.getElementById('AfterUVDostavka').checked) {
			document.getElementById('OutputForVelic').innerHTML+="<p>C�������� ��������: 450 ���.</p>";
			document.getElementById('OutputForVelic').innerHTML+="<p>�����: " + (ItogoSum+450) + " ���.</p>";
		} else {
			document.getElementById('OutputForVelic').innerHTML+="<p>C�������� ��������: 0 ���. (���������)</p>";
			document.getElementById('OutputForVelic').innerHTML+="<p>�����: " + ItogoSum + " ���.</p>";
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
		case "�������": return (VeloList[Id][1]*priceMultiplier) + " ���.";
		case "��������": return (VeloList[Id][2]*priceMultiplier) + " ���.";
		case "����": return (VeloList[Id][3]*priceMultiplier) + " ���.";
		case "������": return (VeloList[Id][4]*priceMultiplier) + " ���.";
		case "������": return (VeloList[Id][5]*priceMultiplier) + " ���.";
		case "����": return (VeloList[Id][6]*priceMultiplier) + " ���.";
		case "������": return (VeloList[Id][7]*priceMultiplier) + " ���.";
		default: return "N/a ���.";
	}
}

</script>

</Body>
</html>