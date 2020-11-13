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


function addmenu(){
var addm=document.getElementById("addmenu");
addm.style.display="block";
addm.style.top="100px";
addm.style.position="fixed";
document.getElementById("blur").style.opacity="0.5";

}
function delfood(){
  var delf=document.getElementById("delfood");
  delf.style.display="block";
delf.style.top="100px";
delf.style.position="fixed";
document.getElementById("blur").style.opacity="0.5";
}