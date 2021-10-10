<?php
$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");
$MistakeType = -1;
$CountryMax = 0;
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sqlCnt="SELECT COUNTRYID FROM countrys ORDER BY COUNTRYID";

if ($result=mysqli_query($con,$sqlCnt))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
		++$CountryMax;
	}
  // Free result set
  mysqli_free_result($result);
}


$sql="SELECT USERLOGIN,USEREMAIL FROM users ORDER BY USERID";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
		if(strtolower($_GET['l'])==strtolower($row[0]))
		{
			$MistakeType = 1;
			break;
		}
		if(strlen($_GET['l'])<4)
		{
			$MistakeType = 2;
			break;
		}
		if(strlen($_GET['l'])>16)
		{
			$MistakeType = 3;
			break;
		}
		if(strlen($_GET['p'])<4) {
			$MistakeType = 4;
			break;
		}
		if(strlen($_GET['p'])>16) {
			$MistakeType = 5;
			break;
		}
		if(strtolower($_GET['e'])==strtolower($row[1])) {
			$MistakeType = 6;
			break;
		}
		if(strlen($_GET['e'])==0) {
			$MistakeType = 14;
			break;
		}
		if($_GET['by']=="���" || $_GET['bm']=="�����" || $_GET['bd']=="����") {
			$MistakeType = 7;
			break;
		}
		if(!(checkdate($_GET['bm'],$_GET['bd'],$_GET['by']))) {
			$MistakeType = 8;
			break;
		}
		if($_GET['c']<0 || $_GET['c']>$CountryMax-1)
		{
			$MistakeType = 9;
			break;
		}
		if(strlen($_GET['telep'])!=16 && $_GET['AuthD']==true)
		{
			$MistakeType = 10;
			break;
		}
		if(!(isset($_GET['privacy'])))
		{
			$MistakeType = 12;
			break;
		}
		if(!(isset($_GET['terms'])))
		{
			$MistakeType = 13;
			break;
		}
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);


$json = "https://www.google.com/recaptcha/api/siteverify?secret=6Lc5hFoUAAAAAOG81jvWAkA6d7WSX3z78YEKK6i-&response=".$_GET['response'];

$xml = file_get_contents($json);

$xml = json_decode($xml);

if(!($xml->{"success"}) && $MistakeType==-1) {
	$MistakeType = 11;
}


switch ($MistakeType) {
    case -1:
        echo "";
        break;
    case 1:
        echo "����� ������������ ��� ����������!";
        break;
    case 2:
        echo "����� ������ �� ������ ���� ������ 4 ��������!";
        break;
    case 3:
        echo "����� ������ �� ������ ��������� 16 ��������!";
        break;
    case 4:
        echo "����� ������ �� ������ ���� ������ 4 ��������!";
        break;
    case 5:
        echo "����� ������ �� ������ ��������� 16 ��������!";
        break;
    case 6:
        echo "������ email ��� ������������!";
        break;
    case 7:
        echo "�� ������� ���� ��������!";
        break;
    case 14:
        echo "�� ������� E-Mail �����!";
        break;
    case 8:
        echo "������ � ������ ���� ��������!";
        break;
    case 9:
        echo "������� �������������� ������ � ����!";
        break;
    case 10:
        echo "�� �� ������ ���������� ������� �������������� �� ���� ��������!";
        break;
    case 11:
        echo "��������� ������ �� ��������!";
        break;
    case 12:
        echo "����������� ���� �������� � ��������� ������������������ �����!";
        break;
    case 13:
        echo "�� �� ������� ���������������� ����������!";
        break;
}


if($MistakeType==-1) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tradeplatfromserverdb";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

    $dateFinal = date("Y-m-d H:i:s", strtotime($_GET['by'].'-'.$_GET['bm'].'-'.$_GET['bd'].' 00:00:00'));
	
	$sql = "INSERT INTO users (USERLOGIN, USERPASSWORD, USEREMAIL, USERNAME, USERSECONDNAME, USERTHIRDNAME, USERBIRTHDAY, USERCITY, USERTELEPHONE, USERHOMEPAGE, USERCOUNTRY, USERROLE, USERAVATARURL)
	VALUES (\"" . $_GET['l']. "\", \"" . $_GET['p'] . "\", \"". $_GET['e'] . "\", \"". $_GET['name'] . "\", \"". $_GET['secname']. "\", \"". $_GET['thirdname'] . "\", \"". $dateFinal. "\", \"". $_GET['city']. "\", \"". $_GET['tele']."\", \"".$_GET['hpage']."\", \"".$_GET['c']."\", \"User\", \"".$_GET['ava']."\")";

	if (mysqli_query($conn, $sql)) {
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}

?>