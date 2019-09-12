var pass="";
$(document).ready(function() {
	$("#imie_label").text(imie);
	$("#login_label").text(login_h);
	$("#email_label").text(email);
	$("#logo").prop('src', 'users/'+login_h+'/logo/logo'+fileext);
});
$("#fileToUpload").on('change', function(event) {
	event.preventDefault();
	var filename = event.target.files[0].name;
	$("#filename_label").text(filename);
});
function sprawdz(){
	if($("#fileToUpload").val()!="")
	{
		return true;
	}
	else
	{
	return false;
	}
}
$("#passwordchange_btn").click(function(event) {
	window.open('password_set.php', '_blank');	
});
$("#deleteaccount_btn").click(function(event) {
	var usun=prompt('Write word "DELETE" below to permanently delete your account');
	if(usun.toUpperCase()=="DELETE")
	{
	setTimeout(function(){alert("We've sent confirmation to your e-mail");
		location.href="?logout=1";
},1000);
	$.ajax({
		url: 'emailconfirmation.php',
		type: 'POST',
		async: false,
		data: {registered: login_h,imie: imie, email: email, check: 4},
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	});
	
	}
});