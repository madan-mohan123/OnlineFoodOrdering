
const name=document.getElementById('name');
const email=document.getElementById('email');
const pass=document.getElementById('pass');
const repass=document.getElementById('repass');


function checkInputsName(){
const uservalue=name.value.trim();

if(uservalue ===''){
 
    showError(name,"Name cannot be blank");
}
else if(!testname(uservalue)){

    showError(name,"First letter should be capital & not have special symbol");
  
}
else{
    showSuccess(name,"success");
   
}
}

function checkInputsEmail(){
    const emailvalue=email.value.trim();
  
if(emailvalue ===''){
  
    showError(email,"Email cannot be blank");
    
}
else if(!testemail(emailvalue)){
    showError(email,"Invalid Email");
  
}
else{
   
    showSuccess(email,"success");
   
}
}
function checkInputsPass(){
    const passvalue=pass.value.trim();
if(passvalue ===''){
  
    showError(pass," Password cannot be blank");
}

else{
  
    showSuccess(pass,"success");
}
}
function checkInputsRepass(){

    const repassvalue=repass.value.trim();
    const passvalue=pass.value.trim();
if(repassvalue ===''){
  
    showError(repass,"Re Password cannot be blank");
}
else if(!(repassvalue === passvalue)){
    showError(repass,"Password Mismatch");
}
else{
  
    showSuccess(repass,"success");
}
}

function showError(input,msg){
    const formControl= input.parentNode;
    
    const small=formControl.querySelector('.msg');
    small.innerText= msg;
    small.style.display="block";

    const icon=formControl.querySelector('.icon');
    icon.style.display="none";

    const ricon=formControl.querySelector('.ricon');
    ricon.style.display="initial";
  
    formControl.querySelector("input").style.border="2px solid red";

}
function showSuccess(input,msg){
    const formControl= input.parentNode;

    const small=formControl.querySelector('.msg');
    small.style.display="none";

    const icon=formControl.querySelector('.icon');
    icon.style.display="initial";

    const ricon=formControl.querySelector('.ricon');
    ricon.style.display="none";
    formControl.querySelector("input").style.border="2px solid black";

  
   

}
function testemail(input){
   
    return  input.match(/(^[a-zA-Z0-9-_\.]+)@([a-zA-Z]+)(\.[a-zA-Z]{2,})/) ;
}
function testname(input){
   
    return  input.match(/(^[A-Z]{1})([a-zA-Z]*)/) ;
}

