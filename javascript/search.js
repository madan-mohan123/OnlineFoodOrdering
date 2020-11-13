var i = 1;
function menu() {
  if (i % 2 != 0) {
    document.getElementById("menucard").style.display = "none";
    document.getElementById("item").style.display = "none";
    document.getElementById("hotelmenu").style.display = "block";
  } else {
    document.getElementById("menucard").style.display = "none";
    document.getElementById("item").style.display = "block";
    document.getElementById("hotelmenu").style.display = "none";
  }
  i++;
}
function menucard() {
  document.getElementById("hotelmenu").style.display = "none";
  document.getElementById("menucard").style.display = "block";
}