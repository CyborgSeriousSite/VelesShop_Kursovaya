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
������� ��������
</td>

<td class="MenuItem" onclick="PageNavigation(1);">
� �����
</td>

<td class="MenuItem" onclick="PageNavigation(2);">
��������
</td>

<td class="MenuItem" onclick="PageNavigation(3);">
����� �������
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
	<a href=\"/denwer/index.php?page=registration\" class=\"aNoDecLink\">�����������</a>
	<span>|</span>
	<a class=\"aNoDecLink\" onClick=\"ToggleLogin();\">����</a>
	</td>
	";
		
	} else {
		
	echo "
	<td align=\"right\">
	<span>������ ����, </span>
	<a class=\"aNoDecLink\" onClick=\"MyWindow=window.open('/denwer/profile.php?id=".$_SESSION["UserID"]."','MyWindow','width=800,height=350'); return false;\" href=\"#\">".$_SESSION["Username"]."</a>
	<span>|</span>
    <a class=\"aNoDecLink\" href=\"\" onclick=\"Logout();\">�����</a>
	</td>
	";
		
	}

?>

</tr>
</table>
</header>

<div class="page">

<h2>��� �����</h2>
<b>� �������� �����</b>
<br>
<p>�������� ����� � ����� ���������� ������� ��������-�������, ������������������ �� �����������. ���������������� ���� �������� ���������� ����� 50 ������� ������ ������� ������� ����� ��� � 70 ������� ������.</p>
<br>
<p>��� ���� �������� ���������� �������, ���������� ������� ����������� ������������ �������.</p>
<br>
<b>������������</b>
<br>
<p>������ � ��� ������� ����, ����������� ������� � ���, ���, ����� � ��� �������� ����� � �������� �������. ���� ����������� ��������� �������� ���� ������ ����� � ���� �� ����������. �� ����������� ������� �������� ������� � ����� � ����������� ������.</p>

</div>

<footer align="center">
<div>
Powered by Cyborg aka ����� ���������
</div>
<div>
All rights reserved 2018 (c)
</div>
</footer>

</BODY>