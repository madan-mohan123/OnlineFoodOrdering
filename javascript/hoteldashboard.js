var quate1=document.querySelector(".mfade h2");
var ch=0;
function zoom(){
if(ch==0){
    // quate1.style.transform="scale(0.5)";
    quate1.style.transform="rotateX(360deg)";
  
    ch=1;
}
else if(ch==1){
    // quate1.style.transform="scale(0.6)";
    quate1.style.transform="rotateX(-360deg)";
  
    ch=2;
}
else if(ch==2){
    // quate1.style.transform="scale(0.8)";
    quate1.style.transform="rotateY(360deg)";
    
    ch=3;
}
else if(ch==3){
    // quate1.style.transform="scale(1)";
    quate1.style.transform="rotateY(-360deg)";
    
    ch=4;
}
else if(ch==4){
    // quate1.style.transform="scale(1.2)";
    quate1.style.transform="rotateZ(360deg)";
    
    ch=5;
}
else if(ch==5){
    quate1.style.transform="scale(1.3)";
    //quate1.style.transform="rotateY(-360deg)";
  
    ch=6;
}


if(ch==6){
    quate1.style.transform="scale(1.2)";
    //quate1.style.transform="rotateY(360deg)";
    ch=7;
}
else if(ch==7){
    quate1.style.transform="scale(1)";
    //quate1.style.transform="rotateY(-360deg)";
    
    ch=8;
}
else if(ch==8){
    quate1.style.transform="scale(0.8)";
   // quate1.style.transform="rotateY(360deg)";
    
    ch=9;
}
else if(ch==9){
    quate1.style.transform="scale(0.6)";
    //quate1.style.transform="rotateY(-360deg)";
    
    ch=0;
}


    setTimeout(zoom,4000);
}
zoom();

