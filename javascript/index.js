//script for cooks
var slideIndex = 1;
showSlides(slideIndex);


function plusSlides(n) {
showSlides(slideIndex += n);

}


function showSlides(n) {

var i;
var slides = document.getElementsByClassName("mySlides");

if (n > slides.length) {
    slideIndex = 1
    } 
if (n < 1) {
    slideIndex = slides.length
    }
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
}

slides[slideIndex-1].style.display = "block"; 

}
    


// script for sliding food 
var slidein = 4;
function mplusSlides(n) {
if(n>0){
mshowSlides(slidein += n);
}
else{
  mshowSlidesminus(slidein += n);
}
}


function mshowSlides(n) {
var i;

var mslides = $('.mycarts');
if (n > mslides.length) {
    slidein = mslides.length;
    } 
if (n < 1) {
    slidein = mslides.length;
    }
if(n <= mslides.length && n>4){
mslides[n-5].style.display = "none"; 
mslides[n-1].style.display = "block"; 
mslides[n-2].style.display = "block"; 
mslides[n-3].style.display = "block"; 
mslides[n-4].style.display = "block"; 

}

}

function mshowSlidesminus(n) {

var i;
var mslides = document.getElementsByClassName("mycarts");
if (n > mslides.length) {
    slidein = mslides.length;
    } 
if (n < 4) {
    slidein = 4;
    }
if(n <= mslides.length && n>=4){
mslides[n-1].style.display = "block"; 
mslides[n-2].style.display = "block"; 
mslides[n-3].style.display = "block"; 
mslides[n-4].style.display = "block"; 
mslides[n].style.display = "none"; 
}

}



//script for navigation bar
function sidebar(){
    var x=document.querySelectorAll("header nav ul li");
    var y=document.querySelector("header nav");
    y.style.display="block";
    y.style.right="0px";
    x[0].style.display="block";
    x[1].style.display="block";
    x[2].style.display="block";
y.style.top="0px";
    document.querySelector("header .fa-times").style.display="block";
    
    
}
function closesidebar(){
  
    var y=document.querySelector("header nav");
  
    y.style.display="block";
    y.style.right="-200px";
    y.style.top="-200px";
    document.querySelector("header .fa-times").style.display="none"; 

    
}
function my(x){
    if(x.matches){
    var x=document.querySelectorAll("header nav ul li");
    var y=document.querySelector("header nav");
  
    y.style.display="block";
    y.style.right="-200px";

    x[0].style.display="inline-block";
    x[1].style.display="inline-block";
    x[2].style.display="inline-block";
  
    document.querySelector("header .fa-times").style.display="none"; 
   

}
}

var mc=window.matchMedia("(min-width:1100px)");
my(mc);
mc.addListener(my);


