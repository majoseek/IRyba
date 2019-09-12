function home_click(){
    location.href="home.php";
}
function cloud_click(){
	location.href="user_cloud.php";
}
function account_click(){
    location.href="account.php";
}
function about_click(){
    location.href="about.php";
}
function log_out()
{
    location.href="?logout=1";
}
$(document).ready(function() {
	$("#contact_mail").prop('href', 'mailto:matuslaw.programming@gmail.com?subject=Need Help #'+login_h);
});