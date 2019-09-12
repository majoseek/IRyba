$(document).ready(function() {
	setTimeout(function(){
		$("#registerl").css("visibility","visible");
	$("#registerl").css("transform","scale(1.0)");
	$("#registerl").css("font-size","52px");
},420);
});
var namecorrect=false;
var emailcorrect=false;
var emailcases=false;
var emailistnieje=true;
var passwordcorrect=false;
var istnieje=false;
var logincorrect=false;
var logincases=false;
var loginistnieje=true;
var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
document.addEventListener("keyup",function(event){
if(event.which==9)
{
	if($("#pom_input").is(':focus'))
	{
		$("#namer").focus();
	}
}
if(event.which==13)
{
	$("#submit_btn").trigger('onclick');
}
});
function zmiana_r(){
	if(namecorrect && emailcorrect && logincorrect && passwordcorrect)
	{
		$.ajax({
		url: 'emailconfirmation.php',
		type: 'POST',
		async:false,
		data: {registered: $("#loginr").val(),imie: $("#namer").val(),email: $("#emailr").val(),check: 2},
	})

		
	location.href="?imie="+$("#namer").val()+"&email="+$("#emailr").val()+"&login="+$("#loginr").val()+"&haslo="+$("#passr").val()+"&kliknal=1";
	}
	else
	{
		
		if(!namecorrect)
		{
			$("#namer").css('border', '2px solid rgba(255, 0, 0, 0.7)');
		}
		if(!emailcorrect)
		{
			$("#emailr").css('border', '2px solid rgba(255, 0, 0, 0.7)');
		}
		if(!logincorrect)
		{
			$("#loginr").css('border', '2px solid rgba(255, 0, 0, 0.7)');
		}
		if(!passwordcorrect)
		{
			$("#passr").css('border', '2px solid rgba(255, 0, 0, 0.7)');
		}
	}
}
//FIN
$("#namer").focus(function(event) {
	$("#namelr").css('transform', 'translate(-46px, -180px)');
	$("#namelr").css('font-size', '16px');
	$("#photo_iname").css('transform', 'scale(1.2) translateY(-60px) translateX(80px)');
});
$("#emailr").focus(function(event) {
	$("#emaillr").css('transform', 'translate(-46px, -180px)');
	$("#emaillr").css('font-size', '16px');
	$("#photo_iemail").css('transform', 'scale(1.2) translateY(-60px) translateX(80px)');
});
$("#loginr").focus(function(event) {
	$("#loginlr").css('transform', 'translate(-46px, -180px)');
	$("#loginlr").css('font-size', '16px');
	$("#photo_ilogin").css('transform', 'scale(1.2) translateY(-60px) translateX(80px)');
});
$("#passr").focus(function(event) {
	$("#passlr").css('transform', 'translate(-46px, -180px)');
	$("#passlr").css('font-size', '16px');
	$("#photo_ipass").css('transform', 'scale(1.2) translateY(-60px) translateX(80px)');

});
function duzalitera(wyraz){
	for(var i=0;i<wyraz.length;i++)
	{
		if(wyraz.charAt(i)>='A' && wyraz.charAt(i)<='Z')
		{
			return true;
		}
	}
	return false;
}
function cyfra(wyraz){
	for(var i=0;i<wyraz.length;i++)
	{
		if(wyraz.charAt(i)>='0' && wyraz.charAt(i)<='9')
		{
			return true;
		}
	}
	return false;
}
///
//FOUT
$("#emailr").on("input", function() {

	$.ajax({
		url: 'check_mail.php',
		type: 'POST',
		async:false,
		data: {email: $("#emailr").val()},
	})
	.done(function(data) {
		if(data=='1'){	//ISTNIEJE
				emailistnieje=true;
  }
  else if(data=='0'){	//NIE ISTNIEJE
			emailistnieje=false;
  }
	})
	.fail(function() {
		console.log("error");
	});
	
});
$("#namer").focusout(function(event) {
	if($("#namer").val().length>0)
	{
		
	}
	else{
	$("#namelr").css('transform', 'translate(0, -140px)');
	$("#namelr").css('font-size', '24px');
	}
	

	$("#photo_iname").css('transform', 'translateX(60px) translateY(-50px)');
});
$("#namer").on('input', function(event) {
	event.preventDefault();


	if($("#namer").val().length>0)
	{
		if($("#namer").val().charAt(0)>='A' && $("#namer").val().charAt(0)<='Z' && $("#namer").val().length>1)
		{
			namecorrect=true;
		}
		else
		{
			namecorrect=false;
		}
		if(!namecorrect)
		{
			$("#namep").attr('src', 'images/info_error.png');
		}
		else{
			$("#namep").attr('src', 'images/info_correct.png');
		}
	}
	else
	{
		$("#namep").attr('src', 'images/info_small.png');
		namecorrect=false;
	}
});
$("#emailr").focusout(function(event) {
	if($("#emailr").val().length>0)
	{

	}
	else
	{
	$("#emaillr").css('transform', 'translate(0, -140px)');
	$("#emaillr").css('font-size', '24px');
	}
	

	$("#photo_iemail").css('transform', 'translateX(60px) translateY(-50px)');
});
$("#emailr").on('input', function(event) {
	event.preventDefault();
	if($("#emailr").val().length>0)
	{
	if($("#emailr").val().includes('@') && $("#emailr").val().includes('.') && $("#emailr").val().length>3)
	{
		emailcases=true;
	}
	else
	{
		emailcases=false;
	}

	if(emailcases && !emailistnieje)
	{
		emailcorrect=true;
		$("#email_div").html('<br><br><b>We will send confirmation<br> mail to this adress</b>');
		$("#emailp").attr('src', 'images/info_correct.png');
	}
	else
	{
		emailcorrect=false;
		$("#emailp").attr('src', 'images/info_error.png');
		if(!emailcases)
		{
			$("#email_div").html('<br><br><b>We will send confirmation<br> mail to this adress</b>');
		}
		else if(emailistnieje)
		{
			$("#email_div").html('<br><b>User with that email<br>already exists</b>');
		}
	}
	}
	else
	{
		emailcases=false;
		emailistnieje=false;
		emailcorrect=false;
		$("#email_div").html('<br><br><b>We will send confirmation<br> mail to this adress</b>');
		$("#emailp").attr('src', 'images/info_small.png');
	}
});
$("#loginr").on("input", function() {

	$.ajax({
		url: 'check_login.php',
		type: 'POST',
		async:false,
		data: {user: $("#loginr").val()},
	})
	.done(function(data) {
		if(data=='1'){	//ISTNIEJE
				loginistnieje=true;
  }
  else if(data=='0'){	//NIE ISTNIEJE
			loginistnieje=false;
  }
	})
	.fail(function() {
		console.log("error");
	});
	
});

$("#loginr").focusout(function(event) {
	if($("#loginr").val().length>0)
	{
	}
	else
	{
	$("#loginlr").css('transform', 'translate(0, -140px)');
	$("#loginlr").css('font-size', '24px');
	}
	

	$("#photo_ilogin").css('transform', 'translateX(60px) translateY(-50px)');
});
$("#loginr").on('input', function(event) {
	event.preventDefault();
	if($("#loginr").val().length>0)
	{
	if($("#loginr").val().length>5)
	{
		logincases=true;
	}
	else
	{
		logincases=false;
	}

	if(logincases && !loginistnieje)
	{
		logincorrect=true;
		$("#login_div").html('<br><b>Must have at <br>least 6 characters</b>');
		$("#loginp").attr('src', 'images/info_correct.png');
	}
	else
	{
		logincorrect=false;
		$("#loginp").attr('src', 'images/info_error.png');
		if(!logincases)
		{
			$("#login_div").html('<br><b>Must have at <br>least 6 characters</b>');
		}
		else if(loginistnieje)
		{
			$("#login_div").html('<br><b>User with that login<br>already exists</b>');
		}
	}
	}
	else
	{
		logincases=false;
		loginistnieje=false;
		logincorrect=false;
		$("#login_div").html('<br><b>Must have at <br>least 6 characters</b>');
		$("#loginp").attr('src', 'images/info_small.png');
	}
});
$("#passr").focusout(function(event) {
	if($("#passr").val().length>0)
	{
		
	}
	else{
	$("#passlr").css('transform', 'translate(0, -140px)');
	$("#passlr").css('font-size', '24px');
	}
	
	$("#photo_ipass").css('transform', 'translateX(60px) translateY(-50px)');
});
$("#passr").on('input', function(event) {
	event.preventDefault();
	if($("#passr").val().length>0)
	{
		if(format.test($("#passr").val()) && duzalitera($("#passr").val()) && cyfra($("#passr").val()) && $("#passr").val().length>6)
		{
			passwordcorrect=true;
		}
		else
		{
			passwordcorrect=false;
		}
		if(!passwordcorrect)
		{
			$("#passp").attr('src', 'images/info_error.png');
		}
		else{
			$("#passp").attr('src', 'images/info_correct.png');
		}
	}
	else{
		$("#passp").attr('src', 'images/info_small.png');
		passwordcorrect=false;
	}
});
///
$("#clear_btn").click(function(event) {
 namecorrect=false;
 emailcorrect=false;
 emailcases=false;
 emailistnieje=true;
 passwordcorrect=false;
 istnieje=false;
 logincorrect=false;
 logincases=false;
 loginistnieje=true;
	$("#namer").val('');
	$("#emailr").val('');
	$("#loginr").val('');
	$("#passr").val('');
	$("#namer").focusout();
	$("#emailr").focusout();
	$("#loginr").focusout();
	$("#passr").focusout();
	$("#namer").focus();
	$(".photo_i").attr('src', 'images/info_small.png');
	$("#submit_btn").css('border', '3px solid white');
	$("#namer").css('border', '2px solid white');
	$("#emailr").css('border', '2px solid white');
	$("#loginr").css('border', '2px solid white');
	$("#passr").css('border', '2px solid white');
});
