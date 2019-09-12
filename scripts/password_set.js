var passwordcorrect=false;
var passwordcorrect2=false;
var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
$(document).ready(function() {
		$("#holder_label").text('Set new password for '+login_h);
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
$("#pass1").on('input', function(event) {
	event.preventDefault();
	if($("#pass1").val().length>0)
	{
		if(format.test($("#pass1").val()) && duzalitera($("#pass1").val()) && cyfra($("#pass1").val()) && $("#pass1").val().length>6)
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
	else
	{
		$("#passp").attr('src', 'images/info_small.png');
		passwordcorrect=false;
	}
});
$("#setpass_btn").click(function(event) {
	if(passwordcorrect && passwordcorrect2)
	{
	if($("#pass1").val()!="" && $("#pass2").val()!="")
	{
	$.ajax({
		url: 'emailconfirmation.php',
		type: 'POST',
		async: false,
		data: {registered: login_h,imie: imie, email: email, check: 3, password: $("#pass1").val()},
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	});
	setTimeout(function(){
		alert("Password change e-mail has been sent");
	},1200);
	}
	}
	else
	{
		$("#pass1").val('');
		$("#pass2").val('');
	}	
	});
$("#pass2").on('input', function(event) {
	event.preventDefault();
	if($("#pass2").val().length>0)
	{
		if($("#pass2").val()==$("#pass1").val())
		{
			passwordcorrect2=true;
			$("#passp2").attr('src', 'images/info_correct.png');
		}
		else
		{
			$("#passp2").attr('src', 'images/info_error.png');
			passwordcorrect2=false;
		}
	}
	else
	{
		$("#passp2").attr('src', 'images/info_small.png');
		passwordcorrect2=false;
	}
});