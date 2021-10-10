<?php

$con=mysqli_connect("localhost","root","","tradeplatfromserverdb");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sqlPosts="SELECT POSTID,POSTUID,POSTTEXT,POSTDATE FROM guestbook ORDER BY POSTID";
  $sqlUsers="SELECT USERID,USERLOGIN,USERAVATARURL FROM users ORDER BY USERID";

if ($result=mysqli_query($con,$sqlPosts))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
		if ($resultSecond=mysqli_query($con,$sqlUsers)) {
			while ($row2=mysqli_fetch_row($resultSecond))
			{
				if($row2[0]==$row[1]) {
					$pPostID = $row[0];
					$pPostUID = $row[1];
					$pPostUsername = $row2[1];
					$pPostAvatar = $row2[2];
					$pPostText = $row[2];
					$pPostDate = $row[3];
					
					echo "
					<div class=\"guestpost\">
						<table width=100% border=0>
						
							<tr>
								<td width=50px>
									<img class=\"guestpostava\" src=\"".$pPostAvatar."\"></img>
								</td>
								
								<td rowspan=2 valign=top>
									<p class=\"guestpostdate\">".$pPostDate."</p>
									".$pPostText."
								</td>
							</tr>
							
							<tr>
								<td align=\"center\">
									".$pPostUsername."
								</td>
							</tr>
							
						</table>
					</div>
					";
					
				}
		    }
			mysqli_free_result($resultSecond);
		}
	}
	mysqli_free_result($result);
  }

?>
