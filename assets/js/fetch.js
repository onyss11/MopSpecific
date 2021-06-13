//Fetch register

var formulary = document.getElementById('formulary');
var errorRegister = document.getElementById('errorRegister');
var errorNameR = document.getElementById('errorNameR');
var errorEmailR = document.getElementById('errorEmailR');
var errorPasswordR = document.getElementById('errorPasswordR');
//var errorPasswordRC = document.getElementById('errorPasswordRC');


formulary.addEventListener('submit', function(e){
    e.preventDefault();
    //console.log('prueba')

    var datos = new FormData(formulary);

    //console.log(datos.get('nameR'))

    fetch('../actions/registerUs.php',{
        method: 'POST',
        body: datos
    })

    .then(res => res.json())
    .then(resp => {
        console.log(resp);
        if(resp['nameR']){
            errorNameR.innerHTML = resp['nameR'];
        }else{
            errorNameR.innerHTML = null;
        }
        if(resp['emailR']){
            errorEmailR.innerHTML = resp['emailR'];
        }else{
            errorEmailR.innerHTML = null;
        }if(resp['passwordR']){
            errorPasswordR.innerHTML = resp['passwordR'];
        }else{
            errorPasswordR.innerHTML = null;
        }
        if(resp['userFound']){
            errorRegister.innerHTML = resp['userFound'];
            document.getElementById("nameR").value = "";
            document.getElementById("emailR").value = "";
            document.getElementById("passwordR").value = "";
            document.getElementById("passwordRC").value = "";
            //location.href ="index.php";
        }else{
            errorRegister.innerHTML = null;
        }
    })
})

//fetch Login

var formLog = document.getElementById('formLog');
var errorLog = document.getElementById('errorLog');
var errorEmailL = document.getElementById('errorEmailL');
var errorPasswordL =document.getElementById('errorPasswordL');

formLog.addEventListener('submit', function(e){
    e.preventDefault();
    //console.log ('ahh pirru')

    var datosL = new FormData(formLog);

    fetch('../actions/loginUs.php',{
        method: 'POST',
        body: datosL
    })

    .then(res => res.json())
    .then(resp =>{
        console.log(resp);
        if(resp['emailL']){
            errorEmailL.innerHTML = resp['emailL'];
        }else{
            errorEmailL.innerHTML = null;
        }if(resp['passwordL']){
            errorPasswordL.innerHTML = resp['passwordL'];
        }else{
            errorPasswordL.innerHTML = null;
        }
        if(resp['errorLog']){
            errorLog.innerHTML = resp['errorLog'];
            location.href ="../dashAdmin.php";
        }else{
            errorLog.innerHTML = null;
        }
        /*if(resp['emailL']){
            errorEmailR.innerHTML = resp['emailL'];
        }else{
            errorEmailR.innerHTML = null;
        }if(resp['passwordL']){
            errorPasswordR.innerHTML = resp['passwordL'];
        }else{
            errorPasswordR.innerHTML = null;
        }if(resp['errorLog']){
            errorLog.innerHTML = resp['errorLog'];
            location.href ="index.php";
        }else{
            errorLog.innerHTML = null;
        }*/

    })
})