  var verifyCallback = function(response) {
	alert(response);
  };
  var widgetId1;
  var widgetId2;
  var onloadCallback = function() {
	// Renders the HTML element with id 'example1' as a reCAPTCHA widget.
	// The id of the reCAPTCHA widget is assigned to 'widgetId1'.
	widgetId1 = grecaptcha.render('example1', {
	  'sitekey' : 'your_site_key',
	  'theme' : 'light'
	});
  };


document.addEventListener("DOMContentLoaded", RegPageInitialized);

function AuthAvailability() {
	if(document.getElementById("RegPhone").value.length==0) {
		document.getElementById("DoubleAuth").disabled = true;
		document.getElementById("DoubleAuth").checked = false;
	} else {
		document.getElementById("DoubleAuth").disabled = false;
	}
}

function RegPageInitialized() {
	changeCountryFlag();
	LoadYears();
	LoadMonths();
	LoadDays();
	AuthAvailability();
	document.removeEventListener("DOMContentLoaded", RegPageInitialized);
}

function LoadYears() {
	document.getElementById("RegYear").innerHTML="";
	document.getElementById("RegYear").innerHTML+="<option>Год</option>";
	for (var i = (new Date()).getFullYear(); i>=1990 ; i--) {
	   	document.getElementById("RegYear").innerHTML+="<option>"+i+"</option>";
	}	
}

function LoadMonths() {
	document.getElementById("RegMonth").innerHTML="";
	document.getElementById("RegMonth").innerHTML+="<option>Месяц</option>";
	for (var i = 1; i<=12 ; i++) {
		var dateStr;
		dateStr = i+"/"+i+"/1970";
		var date = new Date(dateStr),
        locale = "ru-ru",
        month = date.toLocaleString(locale, { month: "long" });
	   	document.getElementById("RegMonth").innerHTML+="<option>"+month+"</option>";
	}	
}

function daysInMonth (month, year) {
    return new Date(year, month, 0).getDate();
}

function LoadDays() {
	
	document.getElementById("RegDay").innerHTML="";
	document.getElementById("RegDay").innerHTML+="<option>День</option>";
	
	if((document.getElementById("RegYear").options[document.getElementById("RegYear").selectedIndex].value=="Год") || (document.getElementById("RegMonth").options[document.getElementById("RegMonth").selectedIndex].value=="Месяц")) {
		return;
	}
	
	for (var i = 1; i<=daysInMonth(document.getElementById("RegMonth").selectedIndex,document.getElementById("RegYear").options[document.getElementById("RegYear").selectedIndex].value) ; i++) {
	   	document.getElementById("RegDay").innerHTML+="<option>"+i+"</option>";
	}	
}

function changeCountryFlag() {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("RegFlagICON").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","CountryIconData.php?id="+document.getElementById("CountrySelect").selectedIndex,true);
  xmlhttp.send();
}

document.getElementById("RegisteredForm").style.display = 'none';

function ValidateRegistration() {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText.length!=0) {
		  document.getElementById("MistakeField").innerHTML="Ошибка регистрации:";
		  document.getElementById("MistakeField").innerHTML+=this.responseText;
		  
		  document.getElementById("RegisteredForm").style.display = 'none';
		  document.getElementById("DoRegForm").style.display = 'block';
	  } else {
		  document.getElementById("RegisteredForm").style.display = 'block';
		  document.getElementById("DoRegForm").style.display = 'none';
	  }
    }
  }
  
  var xmlurl = "ValidateRegistration.php?l="+document.getElementById("RegLogin").value
  +"&"+"p="+document.getElementById("RegPassword").value
  +"&"+"e="+document.getElementById("RegEMail").value
  +"&"+"name="+document.getElementById("RegName").value
  +"&"+"secname="+document.getElementById("RegSecName").value
  +"&"+"thirdname="+document.getElementById("RegThirdName").value
  +"&"+"by="+document.getElementById("RegYear").value
  +"&"+"bm="+document.getElementById("RegMonth").selectedIndex
  +"&"+"bd="+document.getElementById("RegDay").value
  +"&"+"c="+document.getElementById("CountrySelect").selectedIndex
  +"&"+"city="+document.getElementById("CityReg").value
  +"&"+"tele="+document.getElementById("RegPhone").value
  +"&"+"hpage="+document.getElementById("HomepageReg").value
  +"&"+"ava="+document.getElementById("AvaUrlReg").value;
  
  document.getElementById("DoubleAuth").checked ? xmlurl+="&AuthD" : xmlurl=xmlurl;
  document.getElementById("HideEmail").checked ? xmlurl+="&HideEMail" : xmlurl=xmlurl;
  document.getElementById("PrivacyAcception").checked ? xmlurl+="&privacy" : xmlurl=xmlurl;
  document.getElementById("TermsOfUseAcception").checked ? xmlurl+="&terms" : xmlurl=xmlurl;
  
  xmlurl+="&response=" + $('#g-recaptcha-response').val();
  
  //document.getElementById("MistakeField2").innerHTML=xmlurl;
  
  xmlhttp.open("GET",xmlurl,true);
  xmlhttp.send();
}

function ToggleLogin() {
   div = document.getElementById("LoginForm");
   if (div.style.display == 'block') {
	   div.style.display = "none";
   } else {
	   div.style.display = "block";
   }
}

function LoginRequest() {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText.length!=0) {
		  document.getElementById("LoginWindowOutput").innerHTML="Ошибка входа:";
		  document.getElementById("LoginWindowOutput").innerHTML+=this.responseText;
	  } else {
		  location.reload();
	  }
    }
  }
  
  var nmcomp = 0;
  
  if(document.getElementById("NotMineComputerL").checked) {
	  nmcomp = "1";
  } else {
	  nmcomp = "0";
  }
  
  var xmlurl = "Login.php?Login="+document.getElementById("LBoxLogin").value  
  +"&"+"Password="+document.getElementById("LBoxPassword").value;
  +"&"+"NotMineComputer="+nmcomp;
  
  xmlhttp.open("GET",xmlurl,true);
  xmlhttp.send();
}

function Logout() {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		  location.reload();
    }
  }
  
  var xmlurl = "Logout.php";
  
  xmlhttp.open("GET",xmlurl,true);
  xmlhttp.send();
}

function AddToCart(originalID) {
	var needID = originalID;
	needID = needID.replace("Span", "Input");
	
	var countadd = document.getElementById(needID).value;
	var formattedID = new Array();
	formattedID = needID.split("_");
	
	  if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp2=new XMLHttpRequest();
	  } else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			  var xmlurl2 = "GetCartCount.php";
			  
			  xmlhttp2.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					  document.getElementById("CartCount").innerHTML=this.responseText;
					  var receivedcount = this.responseText;
					  if(receivedcount=="0") {
						  document.getElementById("CartCount").style.visibility = 'hidden';
					  } else {
						  document.getElementById("CartCount").style.visibility = 'visible';
					  }
				}
			  }
			  
			  xmlhttp2.open("GET",xmlurl2,true);
			  xmlhttp2.send();
		}
	  }
	  
	  var xmlurl = "AddToCart.php?id="+formattedID[1]  
	  +"&"+"count="+countadd;
	  
	  xmlhttp.open("GET",xmlurl,true);
	  xmlhttp.send();	  
}
function RemoveFromCart(originalID) {
	var needID = originalID;
	needID = needID.replace("CRemove", "");
	
	  if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp2=new XMLHttpRequest();
		xmlhttp3=new XMLHttpRequest();
	  } else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			  var xmlurl2 = "GetCartCount.php";
			  
			  xmlhttp2.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					  document.getElementById("CartCount").innerHTML=this.responseText;
					  var receivedcount = this.responseText;
					  if(receivedcount=="0") {
						  document.getElementById("CartCount").style.visibility = 'hidden';
					  } else {
						  document.getElementById("CartCount").style.visibility = 'visible';
					  }
				}
			  }
			  
			  xmlhttp2.open("GET",xmlurl2,true);
			  xmlhttp2.send();
			  
			  var xmlurl3 = "CartPageTable.php";
			  
			  xmlhttp3.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					  document.getElementById("WTBList").innerHTML=this.responseText;
				}
			  }
			  
			  xmlhttp3.open("GET",xmlurl3,true);
			  xmlhttp3.send();
			  
		}
	  }
	  
	  var xmlurl = "RemoveFromCart.php?id="+needID;
	  
	  xmlhttp.open("GET",xmlurl,true);
	  xmlhttp.send();	  
}
function isHidden(el) {
    var style = window.getComputedStyle(el);
    return (style.display === 'none')
}

function SearchListFocus() {
	document.getElementById("searchlist").style.display = "none";
}
function SearchListInput() {
	if(document.getElementById("title-search-input").value.length<1) {
		document.getElementById("searchlist").style.display = "none";
	} else {
		document.getElementById("searchlist").style.display = "table";
		
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				  document.getElementById("searchlist").innerHTML=this.responseText;
			}
		}
		  
		var xmlurl = "SearchBoxList.php?q="+document.getElementById("title-search-input").value;
		  
		xmlhttp.open("GET",xmlurl,true);
		xmlhttp.send();
	}
}
function ShowSList() {
	if(document.getElementById("title-search-input").value.length>0) {
		
		document.getElementById("searchlist").style.display = "none";
		
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				  document.getElementById("ProductionBox").innerHTML=this.responseText;
				  document.getElementById("ProductionBox2").style.display = "none";
				  document.getElementById("ProductionBox3").style.display = "none";
					
				  document.getElementById("ProductionBox").classList.add("sTableCsade");
			}
		}
		  
		var xmlurl = "GetProductList.php?p=1&q="+document.getElementById("title-search-input").value;
		  
		xmlhttp.open("GET",xmlurl,true);
		xmlhttp.send();
	}
}

var currentpage = 1;

function ShowSList_Button(vaction) {
	
	if(vaction=="Prev") {
		currentpage--;
	}
	if(vaction=="Next") {
		currentpage++;
	}
	
	if(document.getElementById("title-search-input").value.length>1) {
		
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				  document.getElementById("ProductionBox").innerHTML=this.responseText;
				  document.getElementById("ProductionBox2").style.display = "none";
				  document.getElementById("ProductionBox3").style.display = "none";
					
				  document.getElementById("ProductionBox").classList.add("sTableCsade");
			}
		}
		
		
		  
		var xmlurl = "GetProductList.php?p="+currentpage+"&q="+document.getElementById("title-search-input").value;
		  
		xmlhttp.open("GET",xmlurl,true);
		xmlhttp.send();
	}
}

function WatchProduct(originalID) {
	var needID = originalID;
	needID = needID.replace("QLProduct", "");
	needID = needID.replace("WatchNewProducts_", "");
	needID = needID.replace("WatchDiscounts_", "");
	needID = needID.replace("WatchRecomended_", "");

	var hurl = "ProductPage.php?id="+needID;
	window.location.href = hurl;
}
function WatchProductByURL(vurl) {
	var hurl = "ProductPage.php?id="+vurl;
	window.location.href = hurl;
}

function PostMessageInGuestBook() {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    xmlhttp2=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
  
		  xmlhttp2.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				document.getElementById("guestbposts").innerHTML=this.responseText;
			}
		  }
		  
		  var xmlurl2 = "GuestBookPosts.php";
		  
		  xmlhttp2.open("GET",xmlurl2,true);
		  xmlhttp2.send();
    }
  }
  
  var xmlurl = "PostMessageInGuestBook.php?t="+document.getElementById("guestbookinput").value;
  
  xmlhttp.open("GET",xmlurl,true);
  xmlhttp.send();
  document.getElementById("guestbookinput").value = "";
}

function PageNavigation(idP) {
	var hurl="/denwer/index.php?page=main";
	
	switch(idP) {
		case 0: hurl="/denwer/index.php?page=main"; break;
		case 1: hurl="/denwer/index.php?page=about"; break;
		case 2: hurl="/denwer/index.php?page=contacts"; break;
		case 3: hurl="/denwer/index.php?page=guestbook"; break;
	}
	
	window.location.href = hurl;
}