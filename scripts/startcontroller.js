var login_w=$("#loginf").val();
var haslo_w=$("#passf").val();
var prawidlowe="niewprowadzono";
var remember=false;
if(localStorage.getItem("remember")==1)
{
	remember=true;
	$("#remember_box").css('background-color', 'rgba(50, 211, 120, 0.9)');
	$("#loginf").val(localStorage.getItem("lwp"));
	$("#passf").val(localStorage.getItem("pwp"));
	flin();
	fpin();
}
else
{
	remember=false;
	$("#remember_box").css('background-color', 'rgba(249, 66, 75, 0.9)');
}
//LISTENER
document.addEventListener("keyup",function(event){

if(event.which==9)
{
	if($("#pom_input").is(':focus'))
	{
		$("#loginf").focus();
	}
}

	if($("#passf").is(':focus') || $("#loginf").is(':focus'))
		{
			login_w=$("#loginf").val();
			haslo_w=$("#passf").val();
		}
	if(event.which==13)
	{
		if($("#passf").is(':focus') || $("#loginf").is(':focus'))
		{
			
			$("#submit_btn").trigger('onclick');
		}
	}
	
})

////
//FOCUS IN
function flin(event) {
	$("#loginl").text("Login");
	$("#loginl").css("transform","translate(-40px,-35px)");
	$("#loginl").css("font-size","18px");
};
function fpin(event) {
	$("#passl").text("Password");
	$("#passl").css("transform","translate(-40px,-35px)");
	$("#passl").css("font-size","18px");
};
////
//FOCUS OUT
function flout(){
	if(!($("#loginf").val()))
	{
	$("#loginl").text('Enter your login...');
	$("#loginl").css("top","220px");
	$("#loginl").css("left","110px");
	$("#loginl").css("transform","none");
	$("#loginl").css("font-size","35px");	
	}
}
function fpout(){
	if(!($("#passf").val()))
	{
		
	$("#passl").text('Enter your password...');
	$("#passl").css("top","380px");
	$("#passl").css("left","110px");
	$("#passl").css("transform","none");
	$("#passl").css("font-size","35px");
	}
}

$("#loginf").focusout(flout);
$("#passf").focusout(fpout);
$("#loginf").focus(flin);
$("#passf").focus(fpin);
function zmiana(){
	/*
	var adres="?login="+login_w+"&haslo="+haslo_w+"&wprowadzono=1";
	location.href=adres;*/
	$.ajax({
		url: 'checkuser.php',
		type: 'POST',
		async:false,
		data: {login: $("#loginf").val(),haslo: $("#passf").val()},
	})
	.done(function(data) {
		console.log(data);
		prawidlowe=data;
	});

	if(prawidlowe!="niewprowadzono")
{
	if(prawidlowe=="poprawne")
	{
		if(remember)
		{
			localStorage.setItem("remember",1);
			localStorage.setItem("lwp",$("#loginf").val());
			localStorage.setItem("pwp",$("#passf").val());
		}
		else
		{
			localStorage.clear();
		}
		location.href="home.php";
	}
	else if(prawidlowe=="niepoprawne")
	{
		localStorage.clear();
		$("#errorl").css('visibility', 'visible');
		$("#errorl").html('<em><b>Incorrect login<br>or password!</b></em>');
	}
	else if(prawidlowe=="nieaktywne")
		{
			localStorage.clear();
			$("#errorl").css('visibility', 'visible');
			$("#errorl").html('<em><b>Your account<br>is inactive!</b></em>');
		}
		$("#loginf").val('');
		$("#passf").val('');
}
}
$("#remember_box").click(function(event) {
	remember=!remember;
	if(remember)
	{
	$("#remember_box").css('background-color', 'rgba(50, 211, 120, 0.9)');
	}
	else
	{
		localStorage.clear();
	$("#remember_box").css('background-color', 'rgba(249, 66, 75, 0.9)');
	}
});