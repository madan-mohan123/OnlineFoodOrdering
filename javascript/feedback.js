//selector


// const form1=document.getElementById('fast');
// const form2=document.getElementById('normal');
const form1=document.getElementById('form1');
const form2=document.getElementById('form2');
const form3=document.getElementById('form3');
const form4=document.getElementById('form4');
const cont=document.getElementById('container');

const fast=document.getElementById('fast');
const normal=document.getElementById('normal');

const next1=document.getElementById('next1');

const next2=document.getElementById('next2');

const back1=document.getElementById('back1');

const back2=document.getElementById('back2');

const pro=document.getElementById('prog');

fast.onclick=function(){
    form1.style.left="-550px";
    form2.style.left="40px";
    pro.style.width="366.6px";
    
  
}
back1.onclick=function(){
    form1.style.left="40px";
    form2.style.left="550px";
    pro.style.width="183.30px";
}
next1.onclick=function(){
    cont.style.display="none";
    
    form4.style.display="block";
    form4.style.left="40px";
    form2.style.left="550px";
}
next2.onclick=function(){
    cont.style.display="none";
    
    form4.style.display="block";
    form4.style.left="40px";
    form2.style.left="550px";
}

normal.onclick=function(){
    form1.style.left="-550px";
    form3.style.left="40px";
    pro.style.width="366.6px";
}
back2.onclick=function(){
    form1.style.left="40px";
    form3.style.left="550px";
    pro.style.width="183.30px";
}

back3.onclick=function(){
    cont.style.display="block";
    form4.style.display="none";
    form1.style.left="40px";
    form2.style.left="550px";
    form3.style.left="550px";
    pro.style.width="183.30px";

}


