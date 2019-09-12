var koncowka_tab=["bmp","jpg","jpeg","jpe","jfif","gif","tif","tiff","png","heic"];
var koncowka_tab_vid=["webm", "mp4", "ogv", "mp3"];
function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
var left = (width - w) / 2 / systemZoom + dualScreenLeft;
var top = (height - h) / 2 / systemZoom + dualScreenTop;
    var newWindow = window.open(url, title, 'channelmode=yes, resizable=no, scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}
function koncowka(nazwa){
	if(nazwa.indexOf('.')<0)
	{
		return false;
	}
var i=0;
var wyraz="";
while(nazwa.charAt(i)!=".")
{
i++;
}
i++;
for(var j=i;j<nazwa.length;j++)
	wyraz+=nazwa.charAt(j);

return wyraz;
}
function utworz_przycisk(tekst)
{
	if(tekst=="logo")
	{
		tekst="CONFIG FILE";
	}
	else
	{

	var trzymacz=document.createElement("div");
	var przycisk=document.createElement("button");
	var przyciski = document.getElementById("buttons");
	var down_btn=document.createElement("button");
	var del_btn=document.createElement("button");

	trzymacz.className="trzymacz_przyciski";
	przycisk.innerHTML=tekst;
	przycisk.id=tekst;
	przycisk.className="przyciski";	
	down_btn.className="down_btn";
	down_btn.innerHTML="Download file";
	del_btn.className="del_btn";
	del_btn.innerHTML="Delete file";
	przyciski.appendChild(trzymacz);
	trzymacz.appendChild(przycisk);
	trzymacz.appendChild(down_btn);
		
	var img_btn=document.createElement("button");
	if(koncowka_tab.includes(koncowka(tekst))==false)
	{
		img_btn.setAttribute('disabled','true');
		img_btn.style.opacity=0.4;	
		img_btn.style.cursor="not-allowed";
	}
	else{
		img_btn.style.borderRight="2px solid white";
	}
	img_btn.innerHTML="Show image";
	img_btn.className="img_btn";
	trzymacz.appendChild(img_btn);
	img_btn.addEventListener ("click", function(){
		PopupCenter("image.php?img=users/"+login_h+"/"+tekst,tekst,'800','700');  
		//window.open("image.php?img=users/"+login_h+"/"+przycisk.innerHTML, '_blank');
	});

		
	var video_btn=document.createElement("button");
	if(koncowka_tab_vid.includes(koncowka(tekst))==false)
	{
		video_btn.setAttribute('disabled','true');
		video_btn.style.opacity=0.5;	
		video_btn.style.cursor="not-allowed";
	}
	else{
		video_btn.style.borderLeft="2px solid white";
	}
	if(koncowka_tab_vid.includes(koncowka(tekst))==false && koncowka_tab.includes(koncowka(tekst))==false)
	{
		video_btn.style.borderLeft="2px solid white";
	}
	video_btn.className="video_btn";
	video_btn.innerHTML="Show video";
	trzymacz.appendChild(video_btn);
	video_btn.addEventListener ("click", function(){
		PopupCenter("video.php?video=users/"+login_h+"/"+tekst,tekst,'800','700');  
		//window.open("video.php?video=users/"+login_h+"/"+przycisk.innerHTML, '_blank');
	});
	trzymacz.appendChild(del_btn);
	down_btn.addEventListener ("click", function() {
		var klucz="";
		$.ajax({
				url: 'getkey.php',
				async: false,
			})
			.done(function(data) {
				console.log("success");
				klucz=data;
			})
			.fail(function() {
				console.log("error");
			});
	window.open('download_file.php?file='+tekst+"&key="+klucz);
	window.location.reload();
	});
	del_btn.addEventListener ("click", function() {
		var usun=confirm("Are you sure you want to delete this item?");
		var klucz="";
		if(usun==true)
		{
			$.ajax({
				url: 'getkey.php',
				async: false,
			})
			.done(function(data) {
				console.log("success");
				klucz=data;
			})
			.fail(function() {
				console.log("error");
			});
			
	window.open('delete_file.php?file='+tekst+"&key="+klucz);
	window.location.reload();
		}
	});
	przycisk.addEventListener ("click", function() {
 	 $("#tags").val(this.innerHTML);
	});

    }
}

$(document).ready(function() {
    for(var i=0;i<pliczki.length;i++)
    {
    	utworz_przycisk(pliczki[i]);
    }
});


$("#fileToUpload").on('change',function(event) {
	event.preventDefault();
	var fileName = event.target.files[0].name;
            $("#filename_label").text(fileName);
});

document.addEventListener("keyup", function(e){
	var key=e.which || e.keyCode;
	if(key==13)
	{
		if($("#tags").is(':focus'))
		{
			var url=($("#tags").val());
			var obj=document.getElementById(url);
			obj.focus();
		}
	}

});

$("#tags").focus(function(event) {
	$("#tags").val('');
});

//AUTO COMPLETE///////

   $( function() {
    $("#tags").autocomplete({
      source: pliczki
    });
  } );

//AC///////////////