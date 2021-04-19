// JavaScript Document
var i=0;

var images =['şehirler/adana/adana.jpg' , 'şehirler/ağrı/ağrı.jpg' , 'şehirler/antalya/antalya.jpg'  , 'şehirler/ankara/ankara.jpg' , 'şehirler/artvin/artvin.jpg'];


var duration = 2000;

function slideımg()
{
	document.slide.src = images[i];
	
	if(i<images.length -1)
	{
		i++;
	}
	else
	{
		i=0;
	}
	setTimeout("slideımg()", duration);
}
window.onload = slideımg;




