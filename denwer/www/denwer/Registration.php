<html>

<head>
	<style type="text/css">
		.MistakeBlink {
		  animation: blink-animation 0.3s steps(5, start) normal;
		  -webkit-animation: blink-animation 0.3s steps(5, start) normal;
		}
		@keyframes blink-animation {
			0% {background-color: white;}
			50% {background-color: red;}
			100% {background-color: white;}
		}
		@-webkit-keyframes blink-animation {
			0% {background-color: white;}
			50% {background-color: red;}
			100% {background-color: white;}
		}
	</style>
</head>


<Body>

<form name=StartReg method=post

<?php

if(isset($_POST['conf'])) {
	echo 'hidden';
} else if (isset($_POST['sub'])) {
	
settype($_POST['Familia'], string);
$familyvar = $_POST['Familia'];
settype($_POST['PersonName'], string);
$namevar = $_POST['PersonName'];
settype($_POST['Otchestvo'], string);
$otchvar = $_POST['Otchestvo'];
settype($_POST['WhereAreYou'], string);
$wherevar = $_POST['WhereAreYou'];
settype($_POST['EmailB'], string);
$emailvar = $_POST['EmailB'];
settype($_POST['vivivi'], string);
$wwwvar = $_POST['vivivi'];

$TheFile = "tempdata.txt";

if (file_exists($TheFile)) {
	@unlink($TheFile);
}
$Openadd = @fopen($TheFile, "a+");
	
$Openadd = @fopen($TheFile, "a+");

settype($_POST['Familia'], string);
$familyvar = $_POST['Familia'];
settype($_POST['PersonName'], string);
$namevar = $_POST['PersonName'];
settype($_POST['Otchestvo'], string);
$otchvar = $_POST['Otchestvo'];
settype($_POST['HowOld'], string);
$oldvar = $_POST['HowOld'];
settype($_POST['WhereAreYou'], string);
$wherevar = $_POST['WhereAreYou'];
settype($_POST['EmailB'], string);
$emailvar = $_POST['EmailB'];
settype($_POST['vivivi'], string);
$wwwvar = $_POST['vivivi'];
$sexVal = $_POST["GenderRIN"];
$katDeyVal = $_POST["Deyatelnost"];
$AdFirmVal = $_POST["NearAdress"];
$InterProd = $_POST["ProductBox"];
$deskVal = $_POST["ProfileDescription"];

@fwrite($Openadd, $familyvar."\t".$namevar."\t".$otchvar."\t".$oldvar."\t".$wherevar."\t".$emailvar."\t".$wwwvar);	

if($sexVal=="MaleG") {
	@fwrite($Openadd, "\t�������");
} else {
	@fwrite($Openadd, "\t�������");
}

if($katDeyVal=="Postavka") {
	@fwrite($Openadd, "\t�������� ������");
} else {
	@fwrite($Openadd, "\t������� ������");
}

if($AdFirmVal=="Office") {
	@fwrite($Openadd, "\t����");
} else {
	@fwrite($Openadd, "\t�������");
}

switch($InterProd) {
	case 0: $InterProd = "����������� NX-72";break;
	case 1: $InterProd = "������ ��� ����������";break;
	case 2: $InterProd = "�������� ������� ��� ������� ���������";break;
	case 3: $InterProd = "������� ���������";break;
	case 4: $InterProd = "�������� ������ BG-1";break;
}

@fwrite($Openadd, "\t".$InterProd);

@fwrite($Openadd, "\t".$deskVal);

$sendAdvertVar = $_POST["ParamAdvEmail"];
$ClosePMVar = $_POST["ParamPMClosed"];

@fwrite($Openadd, "\t".$sendAdvertVar."\t".$ClosePMVar);

@fclose($Openadd);

if ($familyvar!="" and $namevar!="" and $otchvar!="" and $wherevar!="" and $emailvar!="" and $wwwvar!="") {
		echo 'hidden';
	}
}

?>

>
<hr>

<p>�����������:</p>

<hr>

<table border=0>
<tr><td>�������<font color="red">*</font>:</td> <td><input type=text id=Familia name=Familia <?php
settype($_POST['Familia'], string);
$itp = $_POST['Familia'];

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo "value=\"".$explodedFile[0]."\"";
		}

		fclose( $TempFile );

	} else {
		echo "�� �������";
	}

} else {
	if($itp=="") {
		echo "value=\"\"";
	} else {
		echo "value=\"$itp\"";
	}
}

?>
<?php
if (isset($_POST['sub'])) {
	
settype($_POST['Familia'], string);
$familyvar = $_POST['Familia'];

if ($familyvar=="") {
	echo 'class="MistakeBlink"';}
}
?>
>
</input></td></tr>
<tr><td>���<font color="red">*</font>:</td> <td><input type=text name=PersonName <?php
settype($_POST['PersonName'], string);
$itp = $_POST['PersonName'];

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo "value=\"".$explodedFile[1]."\"";
		}

		fclose( $TempFile );

	} else {
		echo "�� �������";
	}

} else {
	if($itp=="") {
		echo "value=\"\"";
	} else {
		echo "value=\"$itp\"";
	}
}

?>
<?php
if (isset($_POST['sub'])) {
	
settype($_POST['PersonName'], string);
$namevar = $_POST['PersonName'];

if ($namevar=="") {
	echo 'class="MistakeBlink"';}}
?>></input></td></tr>
<tr><td>��������<font color="red">*</font>:</td> <td><input type=text name=Otchestvo <?php
settype($_POST['Otchestvo'], string);
$itp = $_POST['Otchestvo'];

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo "value=\"".$explodedFile[2]."\"";
		}

		fclose( $TempFile );

	} else {
		echo "�� �������";
	}

} else {
	if($itp=="") {
		echo "value=\"\"";
	} else {
		echo "value=\"$itp\"";
	}
}
?> 
<?php
if (isset($_POST['sub'])) {
	
settype($_POST['Otchestvo'], string);
$otchvar = $_POST['Otchestvo'];

if ($otchvar=="") {
	echo 'class="MistakeBlink"';}}
?>></input></td></tr>
<tr><td>�������:</td> <td><input type=text name=HowOld <?php
settype($_POST['HowOld'], string);
$itp = $_POST['HowOld'];

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo "value=\"".$explodedFile[3]."\"";
		}

		fclose( $TempFile );

	} else {
		echo "�� �������";
	}

} else {
	if($itp=="") {
		echo "value=\"\"";
	} else {
		echo "value=\"$itp\"";
	}
}

?>></input></td></tr>
<tr><td>����� ����������<font color="red">*</font>:</td> <td><input type=text name=WhereAreYou <?php
settype($_POST['WhereAreYou'], string);
$itp = $_POST['WhereAreYou'];

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo "value=\"".$explodedFile[4]."\"";
		}

		fclose( $TempFile );

	} else {
		echo "�� �������";
	}

} else {
	if($itp=="") {
		echo "value=\"\"";
	} else {
		echo "value=\"$itp\"";
	}
}

?>  
<?php
if (isset($_POST['sub'])) {
	
settype($_POST['WhereAreYou'], string);
$wherevar = $_POST['WhereAreYou'];

if ($wherevar=="") {
	echo 'class="MistakeBlink"';}}
?>></input></td></tr>
<tr><td>E-Mail<font color="red">*</font>:</td> <td><input type=text name=EmailB <?php
settype($_POST['EmailB'], string);
$itp = $_POST['EmailB'];

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo "value=\"".$explodedFile[5]."\"";
		}

		fclose( $TempFile );

	} else {
		echo "�� �������";
	}

} else {
	if($itp=="") {
		echo "value=\"\"";
	} else {
		echo "value=\"$itp\"";
	}
}

?>  
<?php
if (isset($_POST['sub'])) {
	
settype($_POST['EmailB'], string);
$emailvar = $_POST['EmailB'];

if ($emailvar=="") {
	echo 'class="MistakeBlink"';}}
?>></input></td></tr>
<tr><td>www<font color="red">*</font>:</td> <td><input type=text name=vivivi <?php
settype($_POST['vivivi'], string);
$itp = $_POST['vivivi'];

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo "value=\"".$explodedFile[6]."\"";
		}

		fclose( $TempFile );

	} else {
		echo "�� �������";
	}

} else {
	if($itp=="") {
		echo "value=\"\"";
	} else {
		echo "value=\"$itp\"";
	}
}
?>  
<?php
if (isset($_POST['sub'])) {
	
settype($_POST['vivivi'], string);
$wwwvar = $_POST['vivivi'];

if ($wwwvar=="") {
	echo 'class="MistakeBlink"';}}
?>></input></td></tr>
<tr><td>���:</td> <td><input id="GenderRIM" name="GenderRIN" type="radio" value="MaleG" 
<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[7]=="�������") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "checked";
}

?>
>�������</input></td> <td><input id="GenderRIW" name="GenderRIN" type="radio" value="WomanG"
<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[7]=="�������") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "";
}

?>
>�������</input></td></tr>
<tr><td>��������� ������������:</td> <td><input id="Deyatelnost" name="Deyatelnost" type="radio" value="Postavka" 
<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[8]=="�������� ������") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "checked";
}

?>
>�������� ������</input></td> <td><input id="Deyatelnost" name="Deyatelnost" type="radio" value="Zakupka"
<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[8]=="������� ������") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "";
}

?>
>������� ������</input></td></tr>
<tr><td>����������� ����� �����:</td> <td><input id="NearAdress" name="NearAdress" type="radio" value="Office" 

<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[9]=="����") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "checked";
}

?>

>����</input></td> <td><input id="NearAdress" name="NearAdress" type="radio" value="Shop"

<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[9]=="�������") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "";
}

?>

>�������</input></td></tr>
<tr><td>������������ �����:</td> 

<td>
<select name=ProductBox id=ProductBox>

	<?php
	$products = array();
	$products[0] = "����������� NX-72";
	$products[1] = "������ ��� ����������";
	$products[2] = "�������� ������� ��� ������� ���������";
	$products[3] = "������� ���������";
	$products[4] = "�������� ������ BG-1";
	
	for ($i=0;$i<count($products);$i++)
	{
		if (isset($_POST['backsub'])) {
			
			$TempFile = fopen("tempdata.txt","r") or die("");


			while($row = fgets($TempFile)) {
			  $explodedFile = explode( "\t", $row );
				
			  if($explodedFile[10]==$products[$i]) {
				  echo "<option selected value=".$i.">".$products[$i]."</option>";
			  } else {
				  echo "<option value=".$i.">".$products[$i]."</option>";
			  }
			}

			fclose( $TempFile );
		} else {
			echo "<option value=".$i.">".$products[$i]."</option>";
		}
	}

	?>
	
</select>
</td> 

</td></tr>

<tr><td valign=top>������������:</td> 

<td>
<select name=SecureBox multiple>

	<?php
	$protection = array();
	$protection[0] = "������� ��������������";
	$protection[1] = "���������� ��������� ������";
	
	for ($i=0;$i<count($protection);$i++)
	{
		echo "<option value=".$i.">".$protection[$i]."</option>";
	}

	?>
	
</select>
</td> 

</td></tr>

<tr><td valign=top>������� ���������� � ����:</td> <td>
<textarea rows=5 cols=40 id=ProfileDescription name=ProfileDescription><?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  echo $explodedFile[11];
		}

		fclose( $TempFile );

	} else {
		echo "...";
	}

} else {
	echo "...";
}

?></textarea>
</td></tr>

<tr><td><input name="ParamAdvEmail" type="checkbox" value="1" 
<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[12]!="") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "checked";
}

?>
>���������� ����������� �� �����</input></td> <td><input name="ParamPMClosed" type="checkbox" value="0"
<?php

if (isset($_POST['backsub'])) {

	if (file_exists("tempdata.txt")) {

		$TempFile = fopen("tempdata.txt","r") or die("");


		while($row = fgets($TempFile)) {
		  $explodedFile = explode( "\t", $row );

		  if($explodedFile[13]!="") {
			  echo "checked";
		  }
		}

		fclose( $TempFile );

	} else {
		echo "";
	}

} else {
	echo "";
}

?>
>�� �������� ������ ��������� �� �������������</input></td></tr>

</table>

<p><input type=submit name="sub" value="���������"></input> <input type=reset value="��������"></input></p>

<hr>



<?PHP
if(isset($_POST['conf'])) {
	$TheFile = "tempdata.txt";
	$TheFile2 = "RegisteredUser.txt";
	
	if (file_exists($TheFile)) {
		if (file_exists($TheFile2)) {
			unlink($TheFile2);
		}
		rename($TheFile,$TheFile2);
	}
	
}
?>

</form>

<form name=FinalReg method=post 

<?php

function hideForm()
{
   echo 'hidden';
}

if(isset($_POST['conf'])) {
	hideForm();
} else if (isset($_POST['sub'])) {	
	settype($_POST['Familia'], string);
	$familyvar = $_POST['Familia'];
	settype($_POST['PersonName'], string);
	$namevar = $_POST['PersonName'];
	settype($_POST['Otchestvo'], string);
	$otchvar = $_POST['Otchestvo'];
	settype($_POST['WhereAreYou'], string);
	$wherevar = $_POST['WhereAreYou'];
	settype($_POST['EmailB'], string);
	$emailvar = $_POST['EmailB'];
	settype($_POST['vivivi'], string);
	$wwwvar = $_POST['vivivi'];
	
	if ($familyvar=="" or $namevar=="" or $otchvar=="" or $wherevar=="" or $emailvar=="" or $wwwvar=="") {
		hideForm();
	}
} else {
	settype($_POST['Familia'], string);
	$familyvar = $_POST['Familia'];
	settype($_POST['PersonName'], string);
	$namevar = $_POST['PersonName'];
	settype($_POST['Otchestvo'], string);
	$otchvar = $_POST['Otchestvo'];
	settype($_POST['WhereAreYou'], string);
	$wherevar = $_POST['WhereAreYou'];
	settype($_POST['EmailB'], string);
	$emailvar = $_POST['EmailB'];
	settype($_POST['vivivi'], string);
	$wwwvar = $_POST['vivivi'];

	if ($familyvar=="" or $namevar=="" or $otchvar=="" or $wherevar=="" or $emailvar=="" or $wwwvar=="") {
		hideForm();
	}	
}

?>

>

<hr>

<p>��������� ��� ������������������� �������:</p>

<hr>

<table border=0>
<tr><td><span id="FamilyFI">
�������: 
<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[0];
	}

	fclose( $TempFile );

} else {
    echo "�������";
}

?>

</span></td></tr>
<tr><td><span id="NameFI">
���: 
<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[1];
	}

	fclose( $TempFile );

} else {
    echo "�������";
}

?>
</span></td></tr>
<tr><td><span id="OtchestvoFI">
��������: 
<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[2];
	}

	fclose( $TempFile );

} else {
    echo "���������";
}

?>
</span></td></tr>
<tr><td><span id="OldFI">
�������: 
<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[3];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>
<tr><td><span id="CityFI">
����� ����������: 
<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[4];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>
<tr><td><span id="EmailFI">
E-Mail: 
<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[5];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>
<tr><td><span id="wwwFI">
www: 
<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[6];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>
<tr><td><span id="SFI">
���: 

<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[7];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>

</span></td></tr>
<tr><td><span id="CategoryFI">
��������� ������������: 

<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[8];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>
<tr><td><span id="NearAdressFI">
����������� ����� �����: 

<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[9];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>
<tr><td><span id="ProductFI">
������������ �����: 

<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[10];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>

<tr><td><span id="DescFI">
������� ���������� � ����: 

<?php

if (file_exists("tempdata.txt")) {

	$TempFile = fopen("tempdata.txt","r") or die("");


	while($row = fgets($TempFile)) {
	  $explodedFile = explode( "\t", $row );

	  echo $explodedFile[11];
	}

	fclose( $TempFile );

} else {
    echo "�� �������";
}

?>
</span></td></tr>

</table>

<p><input type=submit name="conf" value="�����������"></input> <input type=submit name="backsub" value="��������� � ��������������"></input></p>

<hr>

</form>

<form name=ConfirmedReg method=post 
<?php
if(!isset($_POST['conf'])) {
	hideForm();
}
?>
>

<hr>

<p valign="center"><img src="img1/RegistryCheck.png" width="80" height="50" alt="Registy Successful"/>������� ������� ���������������!</p>

<hr>
</form>

</Body>

<?php
// ��� ���� ����� ���� ����?!
?>
</html>